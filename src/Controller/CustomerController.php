<?php
declare(strict_types=1);

namespace App\Controller;

// use App\Mongo\Mongo;
use App\lib\datasources\Mongo;
use MongoDB\BSON\ObjectId as MongoObjectId;

class CustomerController extends AppController
{
    public function initialize(): void
    {
        parent::initialize();
        $this->viewBuilder()->setLayout('myapp');
        $this->viewPath = "/Customer/"; 
        $this->loadComponent('RequestHandler');
        $this->loadComponent('Flash');
        $this->mongo =Mongo::connect();
        $this->customerModel=$this->mongo->customers;
    }
    public function index()
    {
        $listCustomer=$this->customerModel->find()->toArray();
        $this->set('customers',$listCustomer);
        $this->render("index");
        
    }
    public function create()
    {
        $params=$this->request->getQuery();
        if(isset($params['_id'])){
            $customer=$this->customerModel->findOne(['_id'=>new MongoObjectId($params['_id'])]);
            $this->set('customer',$customer);
        }
        $this->render('create');
    }
    public function save()
    {
        $this->request->allowMethod(['post']);
        $data=$this->request->getData();
        if($data['objectId']!=null){
            $updateResult = $this->customerModel->updateOne(
                ['_id' => new MongoObjectId($data['objectId'])],
                ['$set' => [ 
                    'name'=>$data['name'],
                    'phone'=>$data['phone'],
                    'email'=>$data['email'],
                    'address'=>$data['address']]
                ]
            );
            if($updateResult->getModifiedCount()>-1){
                return $this->redirect('/customer');
            }
            var_dump($updateResult);die();
        }
        $save=$this->customerModel->insertOne([
            'name'=>$data['name'],
            'phone'=>$data['phone'],
            'email'=>$data['email'],
            'address'=>$data['address'],
        ]);
        if($save->isAcknowledged()) {
            $this->Flash->success('This was successful');
            return $this->redirect('/customer');
        }
        // var_dump($save->getInsertedId());die();
        var_dump($save);die();
        
    }
    public function destory($_id=null)
    {
        $this->request->allowMethod(['post']);
        $params=$this->request->getQuery();
        if($_id){
            $deleteResult = $this->customerModel->deleteOne(['_id'=>new MongoObjectId($_id)]);
            if($deleteResult) return $this->redirect('/customer');
        }
        var_dump("Cann't delete , ObjectId : ".$_id);
    }
}