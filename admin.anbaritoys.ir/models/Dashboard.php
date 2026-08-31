<?php
/* داشبورد — فقط کوئری‌های خواندنی COUNT/SELECT (بدون هیچ تغییری روی داده) */

function dashCount($sql, $params = [])
{
    global $cn;
    $result = $cn->prepare($sql);
    foreach ($params as $i => $p) {
        $result->bindValue($i + 1, $p);
    }
    $result->execute();
    return (int)$result->fetchColumn();
}

function dashProductsStats()
{
    return [
        'total'        => dashCount("select count(*) from products"),
        'active'       => dashCount("select count(*) from products where status = 'active'"),
        'inactive'     => dashCount("select count(*) from products where status = 'inactive'"),
        'unavailable'  => dashCount("select count(*) from products where status = 'unavialable' or stock <= 0"),
    ];
}

function dashOrdersStats()
{
    return [
        'total'   => dashCount("select count(*) from orders"),
        'success' => dashCount("select count(*) from orders where status = 'success'"),
        'failed'  => dashCount("select count(*) from orders where status = 'failed'"),
        'today'   => dashCount("select count(*) from orders where create_at >= CURDATE()"),
    ];
}

function dashUsersStats()
{
    return [
        'total'   => dashCount("select count(*) from users"),
        'blocked' => dashCount("select count(*) from users where status = 'inactive'"),
    ];
}

function dashPendingCounts()
{
    return [
        'comments'  => dashCount("select count(*) from comente where status = 'inactive'"),
        'questions' => dashCount("select count(*) from about_us_question"),
    ];
}

function dashLatestOrders($limit = 8)
{
    global $cn;
    $sql = "select o.id, o.tracking_code, o.total_amount, o.amount_payable, o.status, o.status_admin, o.create_at, u.mobile
            from orders o
            left join users u on u.id = o.user_id
            order by o.id desc
            limit " . (int)$limit;
    $result = $cn->prepare($sql);
    $result->execute();
    if ($result->rowCount() > 0) {
        return $result->fetchAll();
    }
    return false;
}
