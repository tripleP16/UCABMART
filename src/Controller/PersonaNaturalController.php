<?php
declare(strict_types=1);

namespace App\Controller;

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
        $estadosSQL = $this->Lugar->estados(); 
        $estados = $this->Lugar->lugarSelect($estadosSQL);
        $this->set('estados', $estados);
        $municipiosSQL = $this->Lugar->municipios(); 
        $municipios = $this->Lugar->lugarSelect($municipiosSQL);
        $this->set('municipios', $municipios);
        $parroquiasSQL = $this->Lugar->parroquias(); 
        $parroquias = $this->Lugar->lugarSelect($parroquiasSQL);    // SE CARGA EL CONTENIDO DE LOS SELECT DEL FORMULARIO
        $this->set('parroquias', $parroquias);
        $tiendasSQL= $this->Tienda->tiendas(); 
        $tiendas = $this->Tienda->tiendaSelect($tiendasSQL); 
        $this->set('tiendas',$tiendas);
        
        $personaNatural = $this->PersonaNatural->newEmptyEntity();
        if ($this->request->is('post')) {
            $personaNatural = $this->PersonaNatural->patchEntity($personaNatural, $this->request->getData());  // SE INSERTA LA PERSONA NATURAL 
            if ($this->PersonaNatural->save($personaNatural)) {
                

                return $this->redirect(['controller'=>'inicio','action' => 'index']);
            }
            
        }
        $this->set(compact('personaNatural'));
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
