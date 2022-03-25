<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Danger[]|\Cake\Collection\CollectionInterface $dangers
 */
?>
<div class="dangers index content">
    <?= $this->Html->link(__('New Danger'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Dangers') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('acesso') ?></th>
                    <th><?= $this->Paginator->sort('ativo') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th><?= $this->Paginator->sort('modified') ?></th>
                    <th><?= $this->Paginator->sort('role_id') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($dangers as $danger): ?>
                <tr>
                    <td><?= $this->Number->format($danger->id) ?></td>
                    <td><?= h($danger->acesso) ?></td>
                    <td><?= h($danger->ativo) ?></td>
                    <td><?= h($danger->created) ?></td>
                    <td><?= h($danger->modified) ?></td>
                    <td><?= $danger->has('role') ? $this->Html->link($danger->role->id, ['controller' => 'Roles', 'action' => 'view', $danger->role->id]) : '' ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $danger->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $danger->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $danger->id], ['confirm' => __('Are you sure you want to delete # {0}?', $danger->id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>
