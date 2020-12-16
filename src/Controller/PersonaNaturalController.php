<?php
declare(strict_types=1);

namespace App\Controller;
use Cake\Datasource\ConnectionManager;

/**
 * PersonaNatural Controller
 *
 * @property \App\Model\Table\PersonaNaturalTable $PersonaNatural
 * @property \App\Model\Table\LugarTable $lugares
 * @property \App\Model\Table\TelefonoTable $telefono
 * @property \App\Model\Table\CuentaUsuarioTable $cuenta
 * 
 * @method \App\Model\Entity\PersonaNatural[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PersonaNaturalController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */

     public function initialize(): void
     {
        $this->loadComponent('Flash');
     }

    
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
        $this->loadModel('Telefono');
        $personaNatural = $this->PersonaNatural->newEmptyEntity(); 
       // $telefono = $this->telefono->newEntity();
        //$cuenta_usuario = $this->cuenta->newEmptyEntity();
        $this->loadComponent('Lugar');
        $this->loadComponent('Tienda');
        $this->loadComponent('CuentaUsuario');
        $estadoSQL= $this->Lugar->estados();
        $municipioSQL = $this->Lugar->municipios(); 
        $parroquiasSQL= $this->Lugar->parroquias();
        $tiendasSQL = $this->Tienda->tiendas(); 
        $tiendas = $this->Tienda->tiendaSelect($tiendasSQL);
        $estados = $this->Lugar->lugarSelect($estadoSQL) ; 
        $municipios = $this->Lugar->lugarSelect($municipioSQL); 
        $parroquias = $this->Lugar->lugarSelect($parroquiasSQL);
        $this->set('estados', $estados);
        $this->set('parroquias',$parroquias); 
        $this->set('municipios',$municipios);
        $this->set('tiendas',$tiendas);
        $personaNatural = $this->PersonaNatural->newEmptyEntity();
        if ($this->request->is('post')) {
            $personaNatural = $this->PersonaNatural->patchEntity($personaNatural, $this->request->getData());
            if ($this->PersonaNatural->save($personaNatural)) {
                $this->request->data['Telefono']['FK_persona_natural'] = $this->PersonaNatural->per_nat_cedula; 
                $this->PersonaNatural->Telefono->save($this->request->data);
                return $this->redirect(['controller' => 'Inicio', 'action' => 'index', 'home']);
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
