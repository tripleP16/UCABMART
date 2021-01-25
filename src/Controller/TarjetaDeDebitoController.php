<?php
declare(strict_types=1);

namespace App\Controller;
use Cake\Datasource\ConnectionManager;

/**
 * TarjetaDeDebito Controller
 *
 * @property \App\Model\Table\TarjetaDeDebitoTable $TarjetaDeDebito
 * @method \App\Model\Entity\TarjetaDeDebito[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class TarjetaDeDebitoController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $connection = ConnectionManager::get('default');
        $tarjetaDeDebito = $this->paginate($this->TarjetaDeDebito);
        $query = $connection->execute('SELECT * FROM ucabmart.tarjeta_de_debito');
        $this->set(compact('query'));
        $this->set(compact('tarjetaDeDebito'));
    }

    /**
     * View method
     *
     * @param string|null $id Tarjeta De Debito id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $tarjetaDeDebito = $this->TarjetaDeDebito->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('tarjetaDeDebito'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $tarjetaDeDebito = $this->TarjetaDeDebito->newEmptyEntity();
        if ($this->request->is('post')) {
            $tarjetaDeDebito = $this->TarjetaDeDebito->patchEntity($tarjetaDeDebito, $this->request->getData());
            if ($this->TarjetaDeDebito->save($tarjetaDeDebito)) {
                $this->Flash->success(__('The tarjeta de debito has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The tarjeta de debito could not be saved. Please, try again.'));
        }
        $this->set(compact('tarjetaDeDebito'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Tarjeta De Debito id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $tarjetaDeDebito = $this->TarjetaDeDebito->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $tarjetaDeDebito = $this->TarjetaDeDebito->patchEntity($tarjetaDeDebito, $this->request->getData());
            if ($this->TarjetaDeDebito->save($tarjetaDeDebito)) {
                $this->Flash->success(__('The tarjeta de debito has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The tarjeta de debito could not be saved. Please, try again.'));
        }
        $this->set(compact('tarjetaDeDebito'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Tarjeta De Debito id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $tarjetaDeDebito = $this->TarjetaDeDebito->get($id);
        if ($this->TarjetaDeDebito->delete($tarjetaDeDebito)) {
            $this->Flash->success(__('The tarjeta de debito has been deleted.'));
        } else {
            $this->Flash->error(__('The tarjeta de debito could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
