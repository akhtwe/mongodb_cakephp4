<?php
declare(strict_types=1);

namespace App\Controller;

// use App\Mongo\Mongo;
use MongoDB\Client as Mongo;
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
        $this->mongo = new Mongo("mongodb://127.0.0.1:27017");
        $this->customerModel=$this->mongo->companydb->customers;
    }
    public function index()
    {
        $listDatabase=$this->mongo->listDatabases();
        // $customer=$this->mongo->companydb->customers;
        $listCustomer=$this->customerModel->find()->toArray();
        $this->set('dbs',$listDatabase);
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
                    'addresss'=>$data['addresss']]
                ]
            );
            if($updateResult->getModifiedCount()>0){
                return $this->redirect('/customer');
            }
            var_dump($updateResult);die();
        }
        $save=$this->customerModel->insertOne([
            'name'=>$data['name'],
            'phone'=>$data['phone'],
            'email'=>$data['email'],
            'addresss'=>$data['addresss'],
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