<?php
declare(strict_types=1);

namespace App\Controller;
use Cake\Event\EventInterface;
use Cake\Datasource\ConnectionManager;

/**
 * Producto Controller
 *
 * @property \App\Model\Table\ProductoTable $Producto
 * @method \App\Model\Entity\Producto[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ProductoController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {   
        $connection = ConnectionManager::get('default');
        $producto = $this->paginate($this->Producto);
        $query = $connection->execute('SELECT prod_codigo, prod_nombre, prod_descripcion,prod_imagen, prod_precio_bolivar,sub_nombre FROM ucabmart.producto JOIN ucabmart.submarca ON producto.FK_submarca=sub_nombre ');
        $this->set(compact('query'));
        $this->set(compact('producto'));
    }
    public function carrito()
    {   
        $connection = ConnectionManager::get('default');
        $producto = $this->paginate($this->Producto);   
        $query = $connection->execute('SELECT prod_codigo,car_unidades_de_producto,car_com_precio FROM ucabmart.carrito_de_compras_virtual');
        $this->set(compact('query'));
        $this->set(compact('producto'));
    }


    /**
     * View method
     *
     * @param string|null $id Producto id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $producto = $this->Producto->get($id, [
            'contain' => [],
        ]);
        //die($this->request->getSession()->read('Auth.User.email')); /// ACAAAAAAA ESTA TU EMAILLLL DIEGOOOOOOOOOOOOOO
        $Total = $this->cuantohay($id);
        $this->set('Total',$Total);

        $Pedido=$this->request->getData('cantidad');
        
        //$queryvista = $connection->execute('SELECT prod_codigo, prod_nombre, prod_descripcion,prod_imagen, prod_precio_bolivar,sub_nombre FROM ucabmart.producto JOIN ucabmart.submarca ON producto.FK_submarca=sub_nombre' );
        $this->set(compact('producto'));
    }

    public function cuantohay($productocodigo){
        $connection = ConnectionManager::get('default');
        $cantidad = $connection->execute('SELECT SUM(zon_pro_cantidad_de_producto) as Total FROM zona_producto where prod_codigo= :i',['i'=>$productocodigo])->fetchAll('assoc');
        return $cantidad[0]['Total'];
    }


    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $producto = $this->Producto->newEmptyEntity();
        if ($this->request->is('post')) {
            $producto = $this->Producto->patchEntity($producto, $this->request->getData());
            if ($this->Producto->save($producto)) {
                $this->Flash->success(__('The producto has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The producto could not be saved. Please, try again.'));
        }
        $factura = $this->Producto->Factura->find('list', ['limit' => 200]);
        $pasillo = $this->Producto->Pasillo->find('list', ['limit' => 200]);

        $zona = $this->Producto->Zona->find('list', ['limit' => 200]);
        $this->set(compact('producto', 'factura', 'pasillo', 'notimart', 'zona'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Producto id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $producto = $this->Producto->get($id, [
            'contain' => ['Factura', 'Pasillo', 'Notimart', 'Zona'],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $producto = $this->Producto->patchEntity($producto, $this->request->getData());
            if ($this->Producto->save($producto)) {
                $this->Flash->success(__('The producto has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The producto could not be saved. Please, try again.'));
        }
        $factura = $this->Producto->Factura->find('list', ['limit' => 200]);
        $pasillo = $this->Producto->Pasillo->find('list', ['limit' => 200]);
    
        $zona = $this->Producto->Zona->find('list', ['limit' => 200]);
        $this->set(compact('producto', 'factura', 'pasillo', 'notimart', 'zona'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Producto id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $producto = $this->Producto->get($id);
        if ($this->Producto->delete($producto)) {
            $this->Flash->success(__('The producto has been deleted.'));
        } else {
            $this->Flash->error(__('The producto could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
/**
 * CarritoDeComprasVirtual Controller
 *
 * @property \App\Model\Table\CarritoDeComprasVirtualTable $CarritoDeComprasVirtual
 * @method \App\Model\Entity\CarritoDeComprasVirtual[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */

}
