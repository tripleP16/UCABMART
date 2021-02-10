<?php
declare(strict_types=1);

namespace App\Controller;
use Cake\Datasource\ConnectionManager;
/**
 * TarjetaDeCredito Controller
 *
 * @property \App\Model\Table\TarjetaDeCreditoTable $TarjetaDeCredito
 * @method \App\Model\Entity\TarjetaDeCredito[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class TarjetaDeCreditoController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $connection = ConnectionManager::get('default');
        $tarjetaDeCredito = $this->paginate($this->TarjetaDeCredito);
        $query = $connection->execute('SELECT * FROM ucabmart.tarjeta_de_credito WHERE Fk_cue_usu_email=:i',['i'=>$this->request->getSession()->read('Auth.User.email')])->fetchAll('assoc');
        $this->set(compact('tarjetaDeCredito'));
        $this->set(compact('query'));
    }

    /**
     * View method
     *
     * @param string|null $id Tarjeta De Credito id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $tarjetaDeCredito = $this->TarjetaDeCredito->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('tarjetaDeCredito'));
    }

    public function isAuthorized(){
        $rol = $this->request->getSession()->read('Auth.User')['rol'];
        if($rol !=null){
            $privilegios = $this->obtenerPrivilegios($rol); 
            foreach ($privilegios as $privilegio){
                if($privilegio == 'Comprar'||){
                    if(in_array($this->request->getParam('action'), array('add','index','edit','view','delete'))){
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
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $tarjetaDeCredito = $this->TarjetaDeCredito->newEmptyEntity();
        if ($this->request->is('post')) {
            $tarjetaDeCredito = $this->TarjetaDeCredito->patchEntity($tarjetaDeCredito, $this->request->getData());
            if ($this->TarjetaDeCredito->save($tarjetaDeCredito)) {
                $this->Flash->success(__('The tarjeta de credito has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The tarjeta de credito could not be saved. Please, try again.'));
        }
        $this->set(compact('tarjetaDeCredito'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Tarjeta De Credito id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $tarjetaDeCredito = $this->TarjetaDeCredito->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $tarjetaDeCredito = $this->TarjetaDeCredito->patchEntity($tarjetaDeCredito, $this->request->getData());
            if ($this->TarjetaDeCredito->save($tarjetaDeCredito)) {
                $this->Flash->success(__('The tarjeta de credito has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The tarjeta de credito could not be saved. Please, try again.'));
        }
        $this->set(compact('tarjetaDeCredito'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Tarjeta De Credito id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $tarjetaDeCredito = $this->TarjetaDeCredito->get($id);
        if ($this->TarjetaDeCredito->delete($tarjetaDeCredito)) {
            $this->Flash->success(__('The tarjeta de credito has been deleted.'));
        } else {
            $this->Flash->error(__('The tarjeta de credito could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
