<?php
declare(strict_types=1);

namespace App\Controller;
use Cake\Datasource\ConnectionManager;
/**
 * CarritoDeComprasVirtual Controller
 *
 * @property \App\Model\Table\CarritoDeComprasVirtualTable $CarritoDeComprasVirtual
 * @method \App\Model\Entity\CarritoDeComprasVirtual[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CarritoDeComprasVirtualController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $connection = ConnectionManager::get('default');
        $query= $connection->execute('SELECT * FROM ucabmart.carrito_de_compras_virtual WHERE cue_usu_email = :e ', [ 'e'=>$this->request->getSession()->read('Auth.User.email')])->fetchAll('assoc');
        $this->set('query',$query);


 
    }

    function anadirCarrito($producto, $cantidad){

        if($this->validar($producto)){
            $this->actualizar($producto, $cantidad);

        }else{
            $this->insertar($producto,$cantidad);
        }


        return $this->redirect(['action' => 'index']);

    }

    function validar($producto){
        $connection = ConnectionManager::get('default');
        $query= $connection->execute('SELECT prod_codigo, cue_usu_email FROM ucabmart.carrito_de_compras_virtual WHERE prod_codigo= :p AND cue_usu_email = :e ', ['p'=>$producto, 'e'=>$this->request->getSession()->read('Auth.User.email')])->fetchAll('assoc');
        if($query == null){
            return false; 
        }else{
            return true;
        }
    }

    function insertar($producto, $cantidad){
        $precio = $this->precio($producto);
        $connection = ConnectionManager::get('default');
        $connection->insert('carrito_de_compras_virtual',[
            'prod_codigo'=>$producto, 
            'cue_usu_email'=>$this->request->getSession()->read('Auth.User.email'), 
            'car_unidades_de_producto'=>$cantidad,
            'car_com_precio'=>$cantidad * $precio
        ]);
    }

    function actualizar($producto, $cantidad){
        $cantidad_Actual = $this->cantidad($producto); 
        $precio = $this->precio($producto);
        $connection = ConnectionManager::get('default');
        $connection->update('carrito_de_compras_virtual', ['car_unidades_de_producto' => $cantidad + $cantidad_Actual, 'car_com_precio'=>($cantidad + $cantidad_Actual) * $precio], ['cue_usu_email' => $this->request->getSession()->read('Auth.User.email') , 'prod_codigo'=>$producto]);
    }

    function cantidad($producto){
        $connection = ConnectionManager::get('default');
        $query = $connection->execute('SELECT car_unidades_de_producto from ucabmart.carrito_de_compras_virtual WHERE prod_codigo= :p AND cue_usu_email = :e ', ['p'=>$producto, 'e'=>$this->request->getSession()->read('Auth.User.email')])->fetchAll('assoc');
        return $query[0]['car_unidades_de_producto'];
    }

    function precio ($producto){
        $connection = ConnectionManager::get('default');
        $query = $connection->execute('SELECT prod_precio_bolivar FROM ucabmart.producto WHERE prod_codigo= :p', ['p'=>$producto])->fetchAll('assoc');
        return $query[0]['prod_precio_bolivar'];
    }
    /**
     * View method
     *
     * @param string|null $id Carrito De Compras Virtual id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $carritoDeComprasVirtual = $this->CarritoDeComprasVirtual->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('carritoDeComprasVirtual'));
    } 

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $carritoDeComprasVirtual = $this->CarritoDeComprasVirtual->newEmptyEntity();
        if ($this->request->is('post')) {
            $carritoDeComprasVirtual = $this->CarritoDeComprasVirtual->patchEntity($carritoDeComprasVirtual, $this->request->getData());
            if ($this->CarritoDeComprasVirtual->save($carritoDeComprasVirtual)) {
                $this->Flash->success(__('The carrito de compras virtual has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The carrito de compras virtual could not be saved. Please, try again.'));
        }
        $this->set(compact('carritoDeComprasVirtual'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Carrito De Compras Virtual id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $carritoDeComprasVirtual = $this->CarritoDeComprasVirtual->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $carritoDeComprasVirtual = $this->CarritoDeComprasVirtual->patchEntity($carritoDeComprasVirtual, $this->request->getData());
            if ($this->CarritoDeComprasVirtual->save($carritoDeComprasVirtual)) {
                $this->Flash->success(__('The carrito de compras virtual has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The carrito de compras virtual could not be saved. Please, try again.'));
        }
        $this->set(compact('carritoDeComprasVirtual'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Carrito De Compras Virtual id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $connection = ConnectionManager::get('default');
        $sesion=$this->request->getSession()->read('Auth.User.email');
        $eliminar=$connection->execute('DELETE FROM carrito_de_compras_virtual WHERE prod_codigo=:P AND cue_usu_email=:i',['i'=>$sesion,'P'=>$id]);
        return $this->redirect(['action' => 'index']);
    }
}


/*$this->request->allowMethod(['post', 'delete']);
$carritoDeComprasVirtual = $this->CarritoDeComprasVirtual->get($id);
if ($this->CarritoDeComprasVirtual->delete($carritoDeComprasVirtual)) {
    $this->Flash->success(__('The carrito de compras virtual has been deleted.'));
} else {
    $this->Flash->error(__('The carrito de compras virtual could not be deleted. Please, try again.'));
}

return $this->redirect(['action' => 'index']);*/
