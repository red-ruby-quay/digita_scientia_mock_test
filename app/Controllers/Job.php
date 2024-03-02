<?php

namespace App\Controllers;
use App\Models\JobModel;
use App\Libraries\Uuid;
use Dompdf\Dompdf;

class Job extends BaseController
{
    public function index()
    {
        $nama = \auth()->user()->username;
        $model = new JobModel();
        $data['job_detail'] = $model->orderBy('ID', 'ASC')->findAll();
        $data['nama'] = $nama;
        $header['title']='Job';
        echo view('partial/header', $header);
        echo view('partial/top_menu');
        echo view('partial/side_menu');
        echo view('job/list', $data);
        echo view('partial/footer');
    }


    public function store()
    {  
        helper(['form', 'url']);
           
        $model = new JobModel();
        $uuid = new Uuid();
        $generated_uuid = $uuid->v4();
          
        $data = [
            'nameJob' => $this->request->getVar('txtNameJob'),
            'dateFrom'  => $this->request->getVar('txtDateFrom'),
            'dateTo'  => $this->request->getVar('txtDateTo'),
            'uuid'  => $generated_uuid,
            ];
        $save = $model->insert_data($data);
        if($save != false)
        {
            $data = $model->where('id', $save)->first();
            echo json_encode(array("status" => true , 'data' => $data));
        }
        else{
            echo json_encode(array("status" => false , 'data' => $data));
        }
    }
   
    public function edit($id = null)
    {
        
     $model = new JobModel();
      
     $data = $model->where('id', $id)->first();
       
    if($data){
            echo json_encode(array("status" => true , 'data' => $data));
        }else{
            echo json_encode(array("status" => false));
        }
    }
   
    public function update()
    {  
   
        helper(['form', 'url']);
           
        $model = new JobModel();
  
        $id = $this->request->getVar('hdnJobId');
  
         $data = [
            'nameJob' => $this->request->getVar('txtNameJob'),
            'dateFrom'  => $this->request->getVar('txtDateFrom'),
            'dateTo'  => $this->request->getVar('txtDateTo'),
            'uuid'  => $this->request->getVar('txtUuid'),
            ];
  
        $update = $model->update($id,$data);
        if($update != false)
        {
            $data = $model->where('id', $id)->first();
            echo json_encode(array("status" => true , 'data' => $data));
        }
        else{
            echo json_encode(array("status" => false , 'data' => $data));
        }
    }
   
    public function delete($id = null){
        $model = new JobModel();
        $delete = $model->where('id', $id)->delete();
        if($delete)
        {
           echo json_encode(array("status" => true));
        }else{
           echo json_encode(array("status" => false));
        }
    }

    public function report(){
        $filename = date('y-m-d-H-i-s'). '-digita-scientia-report';
        $dompdf = new Dompdf();
        $model = new JobModel();
        $data['job_detail'] = $model->orderBy('ID', 'ASC')->findAll();
        $dompdf->loadHtml(view('job/report', $data));
        $dompdf->setPaper('A4', 'landscape');

        // render html as PDF
        $dompdf->render();

        // output the generated pdf
        $dompdf->stream($filename);
    }
}
