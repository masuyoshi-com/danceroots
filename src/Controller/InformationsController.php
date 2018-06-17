<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Informations Controller
 *
 * @property \App\Model\Table\InformationsTable $Informations
 *
 * @method \App\Model\Entity\Information[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class InformationsController extends AppController
{
    public $paginate = [
           'limit' => 20,
           'order' => ['Informations.created' => 'desc']
     ];

    /**
     * お知らせ一覧
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $informations = $this->paginate($this->Informations);
        $this->set(compact('informations'));
    }


    /**
     * お知らせ詳細
     *
     * @param string|null $id お知らせID
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException
     */
    public function view($id = null)
    {
        $information = $this->Informations->get($id);
        $this->set('information', $information);
    }

}
