<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * PersonaJuridica Controller
 *
 * @property \App\Model\Table\PersonaJuridicaTable $PersonaJuridica
 * @method \App\Model\Entity\PersonaJuridica[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PersonaJuridicaController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $personaJuridica = $this->paginate($this->PersonaJuridica);

        $this->set(compact('personaJuridica'));
    }

    /**
     * View method
     *
     * @param string|null $id Persona Juridica id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $personaJuridica = $this->PersonaJuridica->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('personaJuridica'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $this->loadComponent('Lugar');   
        $this->loadComponent('Tienda');
        $this->getEstados();
        $this->getTiendas();
        $personaJuridica = $this->PersonaJuridica->newEmptyEntity();
        if ($this->request->is('post')) {
            $personaJuridica = $this->PersonaJuridica->patchEntity($personaJuridica, $this->request->getData());
            if ($this->PersonaJuridica->save($personaJuridica)) {
               
                return $this->redirect(['controller'=>'inicio','action' => 'index']);
            }
            
        }
        $this->set(compact('personaJuridica'));
    }

    public function getTiendas(){
        $tiendasSQL = $this->Tienda->tiendas(); 
        $tiendas = $this->Tienda->tiendaSelect($tiendasSQL);
        $this->set('tiendas', $tiendas);
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
     * @param string|null $id Persona Juridica id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $personaJuridica = $this->PersonaJuridica->get($id, [
            'contain' => [],
        ]);
        $this->loadComponent('Lugar'); 
        $this->loadComponent('Tienda');
        $this->getEstados();
        $this->getTiendas();
        if ($this->request->is(['patch', 'post', 'put'])) {
            $personaJuridica = $this->PersonaJuridica->patchEntity($personaJuridica, $this->request->getData());
            if ($this->PersonaJuridica->save($personaJuridica)) {
                $this->Flash->success(__('The persona juridica has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The persona juridica could not be saved. Please, try again.'));
        }
        $this->set(compact('personaJuridica'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Persona Juridica id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $personaJuridica = $this->PersonaJuridica->get($id);
        if ($this->PersonaJuridica->delete($personaJuridica)) {
            $this->Flash->success(__('The persona juridica has been deleted.'));
        } else {
            $this->Flash->error(__('The persona juridica could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
