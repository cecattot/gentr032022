<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Danger $danger
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Danger'), ['action' => 'edit', $danger->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Danger'), ['action' => 'delete', $danger->id], ['confirm' => __('Are you sure you want to delete # {0}?', $danger->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Dangers'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Danger'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="dangers view content">
            <h3><?= h($danger->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Acesso') ?></th>
                    <td><?= h($danger->acesso) ?></td>
                </tr>
                <tr>
                    <th><?= __('Ativo') ?></th>
                    <td><?= h($danger->ativo) ?></td>
                </tr>
                <tr>
                    <th><?= __('Role') ?></th>
                    <td><?= $danger->has('role') ? $this->Html->link($danger->role->id, ['controller' => 'Roles', 'action' => 'view', $danger->role->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($danger->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($danger->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($danger->modified) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
