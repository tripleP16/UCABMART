<?php
declare(strict_types=1);

namespace App\Controller;

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
        $producto = $this->paginate($this->Producto);

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
            'contain' => ['Factura', 'Pasillo', 'Notimart', 'Zona'],
        ]);

        $this->set(compact('producto'));
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
        $notimart = $this->Producto->Notimart->find('list', ['limit' => 200]);
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
        $notimart = $this->Producto->Notimart->find('list', ['limit' => 200]);
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
}
