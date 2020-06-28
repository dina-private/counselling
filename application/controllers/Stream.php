<?php

/**
 * Class Stream
 *
 * @author Dinanath Thakur <kumardina023@gmail.com>
 */
class Stream extends Controller
{
    /**
     * index description
     *
     * @author Dinanath Thakur <kumardina023@gmail.com>
     */
    public function index()
    {
        $allCourse = $this->loadModel('CourseModel')->getAll();

        $this->loadView('management/manage-streams')
            ->setData('courses', $allCourse)
            ->render();
    }

    public function ajaxHandler()
    {
        $streamObject = $this->loadModel('StreamModel');

        $data = $_POST;

        switch ($data['method']) {
            case 'getStreams':

                $recordsTotal = $filteredRecordCount = 0;

                if ((isset($data['id']) && $data['id'] != '') ||
                    (isset($data['name']) && $data['name'] != '') ||
                    (isset($data['status']) && $data['status'] != '')) {

                    $apiPostData['id'] = isset($data['id']) ? $data['id'] : '';
                    $apiPostData['name'] = isset($data['name']) ? $data['name'] : '';
                    $apiPostData['status'] = isset($data['status']) ? $data['status'] : '';

                    $filteredRecordCount = 0;

                }

                $apiPostData['limit'] = $data['length'];
                $apiPostData['page'] = ($data['start'] ? ($data['start'] / $data['length']) + 1 : 1);

                $orgList = $streamObject->getAll();

                $dataForTable = [];
                if (!empty($orgList)) {
                    foreach ($orgList as $org) {
                        $dataForTable[] = [
                            'name' => $org['name'],
                            'mobile' => $org['mobile'],
                            'state' => $org['state'],
                            'status' => $org['status'] == 'A' ?
                                '<span class="btn btn-xs btn-success change-status" data-id="' . $org['id'] . '" data-status="' . $org['status'] . '">Active</span>' :
                                '<span class="btn btn-xs btn-danger change-status" data-id="' . $org['id'] . '" data-status="' . $org['status'] . '">In-Active</span>',
                            'action' => '<a href="Organization/view?id=' . $org['id'] . '"><span class="btn btn-xs btn-default"><i class="fa fa-eye"></i></span></a><span class="btn btn-xs btn-default"><a href="Organization/edit?id=' . $org['id'] . '"><i class="fa fa-edit"></i></a></span>',
                        ];
                    }
                }

                $response = ['recordsTotal' => $recordsTotal, 'recordsFiltered' => $filteredRecordCount, 'draw' => (int)$data['draw'], 'data' => $dataForTable];
                break;

            default:

                $response = ['status' => 'error', 'message' => 'Something went wrong.'];
                break;
        }
        header('Content-Type: application/json');

        if (isset($response['status']) && $response['status'] === 'error') {
            header('HTTP/1.1 500 Internal Server error');
        }

        echo json_encode($response);
    }
}
