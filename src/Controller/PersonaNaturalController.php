<?php
declare(strict_types=1);

namespace App\Controller;


use Cake\Event\EventInterface;

/**
 * PersonaNatural Controller
 *
 * @property \App\Model\Table\PersonaNaturalTable $PersonaNatural
 * @method \App\Model\Entity\PersonaNatural[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PersonaNaturalController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
   
   
   
    public function index()
    {
        $personaNatural = $this->paginate($this->PersonaNatural);

        $this->set(compact('personaNatural'));
        parent::initialize();
    $this->loadComponent('RequestHandler');
    }
    
    /**
     * View method
     *
     * @param string|null $id Persona Natural id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $personaNatural = $this->PersonaNatural->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('personaNatural'));
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
        $personaNatural = $this->PersonaNatural->newEmptyEntity();
        if ($this->request->is('post')) {
            $personaNatural = $this->PersonaNatural->patchEntity($personaNatural, $this->request->getData());  // SE INSERTA LA PERSONA NATURAL 
            if ($this->PersonaNatural->save($personaNatural)) {
               
                    return $this->redirect(['controller'=>'PersonaNatural','action' => 'index']);

                
            }
            
        }
        $this->set(compact('personaNatural'));
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
     * @param string|null $id Persona Natural id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $personaNatural = $this->PersonaNatural->get($id, [
            'contain' => [],
        ]);
        $this->loadComponent('Lugar');   
        $this->loadComponent('Tienda');
       
        $this->getEstados();
        $this->getTiendas();
        if ($this->request->is(['patch', 'post', 'put'])) {
            $personaNatural = $this->PersonaNatural->patchEntity($personaNatural, $this->request->getData());
            if ($this->PersonaNatural->save($personaNatural)) {
                $this->Flash->success(__('The persona natural has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The persona natural could not be saved. Please, try again.'));
        }
        $this->set(compact('personaNatural'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Persona Natural id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $personaNatural = $this->PersonaNatural->get($id);
        if ($this->PersonaNatural->delete($personaNatural)) {
            $this->Flash->success(__('The persona natural has been deleted.'));
        } else {
            $this->Flash->error(__('The persona natural could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
