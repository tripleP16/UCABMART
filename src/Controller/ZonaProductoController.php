<?php
declare(strict_types=1);

namespace App\Controller;
use Cake\Datasource\ConnectionManager;

/**
 * ZonaProducto Controller
 *
 * @property \App\Model\Table\ZonaProductoTable $ZonaProducto
 * @method \App\Model\Entity\ZonaProducto[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ZonaProductoController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index($id)
    {
        $connection = ConnectionManager::get('default');
        $query = $connection->execute('SELECT zon_pro_cantidad_de_producto, zon_nombre, tie_direccion , prod_nombre FROM ucabmart.zona_producto JOIN ucabmart.producto ON zona_producto.prod_codigo = producto.prod_codigo JOIN ucabmart.zona ON zona_producto.zon_codigo = zona.zon_codigo JOIN ucabmart.tienda ON tienda.FK_alm_codigo = zona.FK_alm_codigo WHERE tie_codigo = '.$id)->fetchAll('assoc');

        $this->set(compact('query'));
    }



    /**
     * View method
     *
     * @param string|null $id Zona Producto id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $zonaProducto = $this->ZonaProducto->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('zonaProducto'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $zonaProducto = $this->ZonaProducto->newEmptyEntity();
        if ($this->request->is('post')) {
            $zonaProducto = $this->ZonaProducto->patchEntity($zonaProducto, $this->request->getData());
            if ($this->ZonaProducto->save($zonaProducto)) {
                $this->Flash->success(__('The zona producto has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The zona producto could not be saved. Please, try again.'));
        }
        $this->set(compact('zonaProducto'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Zona Producto id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $zonaProducto = $this->ZonaProducto->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $zonaProducto = $this->ZonaProducto->patchEntity($zonaProducto, $this->request->getData());
            if ($this->ZonaProducto->save($zonaProducto)) {
                $this->Flash->success(__('The zona producto has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The zona producto could not be saved. Please, try again.'));
        }
        $this->set(compact('zonaProducto'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Zona Producto id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $zonaProducto = $this->ZonaProducto->get($id);
        if ($this->ZonaProducto->delete($zonaProducto)) {
            $this->Flash->success(__('The zona producto has been deleted.'));
        } else {
            $this->Flash->error(__('The zona producto could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
