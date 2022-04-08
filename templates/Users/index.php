<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User[]|\Cake\Collection\CollectionInterface $users
 */

?>
<div class="users index content">
    <?= $this->Html->link(__('New User'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Users') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= __('id') ?></th>
                    <th><?= __('siape') ?></th>
                    <th><?= __('nome') ?></th>
                    <th><?= __('ativo') ?></th>
                    <th><?= __('created') ?></th>
                    <th><?= __('modified') ?></th>
                    <th><?= __('role_id') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $user): ?>
                <tr>
                    <td><?= $this->Number->format($user->id) ?></td>
                    <td><?= h($user->siape) ?></td>
                    <td><?= h($user->nome) ?></td>
                    <td><?= h($user->ativo) ?></td>
                    <td><?= h($user->created) ?></td>
                    <td><?= h($user->modified) ?></td>
                    <td><?= $user->has('role') ? $this->Html->link($user->role->id, ['controller' => 'Roles', 'action' => 'view', $user->role->id]) : '' ?></td>
                    <td class="actions">
                        <?=  $this->Form->create() ?>
                            <input type="hidden" name="acao" value="edit">
                            <input type="hidden" name="identif" value="<?= $user->id?>">
                        <?php if(($user['id']==$usuarioID AND $usuarioRole != 1) OR $usuarioRole == 1): ?>
                            <button class="btn" type="submit">Edit</button>
                        <?php else: ?>
                            <button class="btn" type="submit" disabled>Edit</button>
                        <?php endif; ?>
                        <?=  $this->Form->end() ?>
                        <?=  $this->Form->create() ?>
                            <input type="hidden" name="acao" value="view">
                            <input type="hidden" name="identif" value="<?= $user->id?>">
                        <?php if(($user['id']==$usuarioID AND $usuarioRole != 1) OR $usuarioRole == 1): ?>
                            <button class="btn" type="submit">View</button>
                        <?php else: ?>
                            <button class="btn" type="submit" disabled>View</button>
                        <?php endif; ?>
                        <?=  $this->Form->end() ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
