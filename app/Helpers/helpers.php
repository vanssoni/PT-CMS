
<?php
function getStatusBadge($status) {
    switch ($status) {
        case 'pass':
            $class = 'success';
            break;
        case 'fail':
            $class = 'danger';
            break;
        case 'pending':
            $class = 'info';
            break;
        default:
            $class = 'default';
            break;
    }

    $badge = '<span class="badge badge-' . $class . '">' . ucfirst($status) . '</span>';

    return $badge;
}