<?php $pager->setSurroundCount(2) ?>

<nav aria-label="Page navigation">
    <ul class="pagination">
    <div class="flex-c-m flex-w w-full p-t-38">
    <?php if ($pager->hasPrevious()) : ?>
        <li>
            <a  class="flex-c-m how-pagination1 trans-04 m-all-7 active-pagination1" href="<?= $pager->getFirst() ?>" aria-label="<?= lang('Pager.first') ?>">
                <span aria-hidden="true"><?= lang('Pager.first') ?></span>
            </a>
        </li>
        <li>
            <a class="flex-c-m how-pagination1 trans-04 m-all-7 active-pagination1" href="<?= $pager->getPrevious() ?>" aria-label="<?= lang('Pager.previous') ?>">
                <span aria-hidden="true"><?= lang('Pre') ?></span>
            </a>
        </li>
    <?php endif ?>

    
    <?php foreach ($pager->links() as $link): ?>
        <li <?= $link['active'] ? 'class="active"' : '' ?>>
            <a class="flex-c-m how-pagination1 trans-04 m-all-7 active-pagination1" href="<?= $link['uri'] ?>">
                <?= $link['title'] ?>
            </a>
        </li>
    <?php endforeach ?>
    
    <?php if ($pager->hasNext()) : ?>
        <li>
            <a class="flex-c-m how-pagination1 trans-04 m-all-7 active-pagination1" href="<?= $pager->getNext() ?>" aria-label="<?= lang('Pager.next') ?>">
                <span aria-hidden="true"><?= lang('Pager.next') ?></span>
            </a>
        </li>
        <li>
            <a class="flex-c-m how-pagination1 trans-04 m-all-7 active-pagination1" href="<?= $pager->getLast() ?>" aria-label="<?= lang('Pager.last') ?>">
                <span aria-hidden="true"><?= lang('Pager.last') ?></span>
            </a>
        </li>
    <?php endif ?>
    </div>
    </ul>
</nav>