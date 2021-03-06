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

    public function beforeFilter(EventInterface $event){
        parent::beforeFilter($event);
        $this->Auth->allow(['index','view']);
        
    }
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

    public function isAuthorized(){
        $rol = $this->request->getSession()->read('Auth.User')['rol'];
        if($rol !=null){
            $privilegios = $this->obtenerPrivilegios($rol); 
            foreach ($privilegios as $privilegio){
                if($privilegio == 'Comprar'){
                    if(in_array($this->request->getParam('action'), array('carrito','index'))){
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
     * View method
     *
     * @param string|null $id Producto id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $connection = ConnectionManager::get('default');
        $producto = $connection->execute('SELECT prod_nombre, prod_imagen, prod_precio_bolivar, prod_codigo, prod_descripcion FROM producto WHERE prod_codigo = :i', ['i'=>$id])->fetchAll('assoc');
        $this->set('total', $this->cuantohay($id));
        $this->set('producto', $producto );

        if ($this->request->is('post')) {
            if($this->request->getData('cantidad') > $this->cuantohay($id)){
                $this->Flash->error(__("Actualmente no poseemos esa cantidad en el stock"));
            }elseif( $this->request->getData('cantidad')< 0){
                $this->Flash->error(__("No puede comprar una cantidad negativa de productos "));
            }else{
                return $this->redirect(['controller'=>'CarritoDeComprasVirtual','action' => 'anadirCarrito', $id, $this->request->getData('cantidad')]);
            }

           

        }


    }

    public function cuantohay($productocodigo){
        $connection = ConnectionManager::get('default');
        $tienda= $this->obtenerTienda($this->request->getSession()->read('Auth.User')['Persona'], $this->request->getSession()->read('Auth.User')['rol']);
        $cantidad = $connection->execute('SELECT SUM(zon_pro_cantidad_de_producto) as Total FROM zona_producto JOIN zona ON zona.zon_codigo = zona_producto.zon_codigo JOIN almacen on zona.fk_alm_codigo = almacen.alm_codigo JOIN tienda ON tienda.fk_alm_codigo = almacen.alm_codigo  where prod_codigo=:i  AND tie_codigo =:j',['i'=>$productocodigo,'j'=>$tienda])->fetchAll('assoc');
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
