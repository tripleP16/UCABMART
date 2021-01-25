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

            
            $sesion=$this->request->getSession()->read('Auth.User.email');
            $connection = ConnectionManager::get('default');
            $carritoDeComprasVirtual = $this->paginate($this->CarritoDeComprasVirtual);   
            $query = $connection->execute('SELECT prod_codigo,car_unidades_de_producto,car_com_precio FROM ucabmart.carrito_de_compras_virtual WHERE cue_usu_email=:i',['i'=>$sesion]);
            
            $this->set(compact('query'));
            $this->set(compact('carritoDeComprasVirtual'));
 
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
