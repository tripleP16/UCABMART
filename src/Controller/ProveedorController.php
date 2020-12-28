<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Proveedor Controller
 *
 * @property \App\Model\Table\ProveedorTable $Proveedor
 *  @property \App\Model\Table\PersonalDeContactoTable $personalDeContacto
 * @method \App\Model\Entity\Proveedor[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ProveedorController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $proveedor = $this->paginate($this->Proveedor);

        $this->set(compact('proveedor'));
    }

    /**
     * View method
     *
     * @param string|null $id Proveedor id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $proveedor = $this->Proveedor->get($id, [
            'contain' => ['Rubro'],
        ]);

        $this->set(compact('proveedor'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $this->loadComponent('Rubro');
        $this->loadComponent('Lugar');  
        $this->getEstados();
        $this->getRubros();
        $proveedor = $this->Proveedor->newEmptyEntity();
        if ($this->request->is('post')) {
            $proveedor = $this->Proveedor->patchEntity($proveedor, $this->request->getData());
            if ($this->Proveedor->save($proveedor)) {
                $this->Flash->success(__('The proveedor has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The proveedor could not be saved. Please, try again.'));
        }
        $rubro = $this->Proveedor->Rubro->find('list', ['limit' => 200]);
        $this->set(compact('proveedor', 'rubro'));
    }

    public function getRubros(){
        $rubrosSQL = $this->Rubro->rubros(); 
        $rubros = $this->Rubro->rubroSelect($rubrosSQL);
        $this->set('rubros', $rubros);
    }
    public function getEstados(){
        $estadosSQL = $this->Lugar->estados(); 
        $estados = $this->Lugar->lugarSelect($estadosSQL);
        $this->set('estados', $estados);
    }

    public function municipios(){
        $id = $this->request->getData('id');
        $tipo = 'lugar';
        $this->loadComponent('Lugar'); 
        $municipiosSQL = $this->Lugar->municipios($id); 
        $municipios = $this->Lugar->devolverSelect($municipiosSQL, $tipo);
        exit(json_encode($municipios));
    
    }

    public function parroquias(){
        $id = $this->request->getData('id');
        $this->loadComponent('Lugar'); 
        $tipo = 'lugar';
        $parroquiasSQL= $this->Lugar->parroquias($id); 
        $parroquias = $this->Lugar->devolverSelect($parroquiasSQL, $tipo);
        exit(json_encode($parroquias));
    }
    /**
     * Edit method
     *
     * @param string|null $id Proveedor id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $proveedor = $this->Proveedor->get($id, [
            'contain' => ['Rubro'],
        ]);
        $this->loadComponent('Lugar');  
        $this->getEstados();
        if ($this->request->is(['patch', 'post', 'put'])) {
            $proveedor = $this->Proveedor->patchEntity($proveedor, $this->request->getData());
            
            if ($this->Proveedor->save($proveedor)) {
                $this->Flash->success(__('The proveedor has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The proveedor could not be saved. Please, try again.'));
        }
        
        $this->loadComponent('Rubro');
         $this->getRubros();
        $this->set(compact('proveedor'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Proveedor id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $proveedor = $this->Proveedor->get($id);
        
        if ($this->Proveedor->delete($proveedor)) {
            $this->Flash->success(__('The proveedor has been deleted.'));
        } else {
            $this->Flash->error(__('The proveedor could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
