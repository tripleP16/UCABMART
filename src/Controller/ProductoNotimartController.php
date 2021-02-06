<?php
declare(strict_types=1);

namespace App\Controller;
use Cake\Datasource\ConnectionManager;

/**
 * ProductoNotimart Controller
 *
 * @property \App\Model\Table\ProductoNotimartTable $ProductoNotimart
 * @method \App\Model\Entity\ProductoNotimart[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ProductoNotimartController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $connection = ConnectionManager::get('default');
        $query = $connection->execute('SELECT prod_codigo, prod_nombre, prod_descripcion,prod_imagen, prod_precio_bolivar,sub_nombre FROM ucabmart.producto JOIN ucabmart.submarca ON producto.FK_submarca=sub_nombre ');
        $this->set(compact('query'));
       
        
    }

    public function editar(){


    }

 

    /**
     * View method
     *
     * @param string|null $id Producto Notimart id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view()
    {
        $connection = ConnectionManager::get('default');
        $query = $connection->execute('SELECT prod_not_fecha_inicio,count(prod_not_codigo) Cantidad FROM ucabmart.producto_notimart GROUP BY producto_notimart.prod_not_fecha_inicio ');
        $this->set(compact('query'));   

        
    }

    public function isAuthorized(){
        $rol = $this->request->getSession()->read('Auth.User')['rol'];
        if($rol !=null){
            $privilegios = $this->obtenerPrivilegios($rol); 
            foreach ($privilegios as $privilegio){
                if($privilegio == 'Notimart'){
                    if(in_array($this->request->getParam('action'), array('index','add','view'))){
                        return true;
                    }else{
                        return false;
                    }
                        
                }
            }
            
            return false;
        }else{
            return false;
        }

        return false;
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add($id)
    {
        $this->loadModel('ProductoNotimart');
        $productoNotimart = $this->ProductoNotimart->newEmptyEntity();
        if ($this->request->is('post')) {
            $productoNotimart = $this->ProductoNotimart->patchEntity($productoNotimart, $this->request->getData());
            $productoNotimart->FK_prod_codigo=$id;
            
            if ($this->ProductoNotimart->save($productoNotimart)) {
                $this->Flash->success(__('The producto notimart has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The producto notimart could not be saved. Please, try again.'));
        }
        $this->set(compact('productoNotimart'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Producto Notimart id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $productoNotimart = $this->ProductoNotimart->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $productoNotimart = $this->ProductoNotimart->patchEntity($productoNotimart, $this->request->getData());
            if ($this->ProductoNotimart->save($productoNotimart)) {
                $this->Flash->success(__('The producto notimart has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The producto notimart could not be saved. Please, try again.'));
        }
        $this->set(compact('productoNotimart'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Producto Notimart id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $productoNotimart = $this->ProductoNotimart->get($id);
        if ($this->ProductoNotimart->delete($productoNotimart)) {
            $this->Flash->success(__('The producto notimart has been deleted.'));
        } else {
            $this->Flash->error(__('The producto notimart could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
