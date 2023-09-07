<?php
$items = [
    [
      'title' => 'Felix',
      'cost' => '120 ₽',
      'weigth' => '100 гр.',
      'img' => 'img/eat1.jpg',
    ],
    [
      'title' => 'Kitekat',
      'cost' => '99 ₽',
      'weigth' => '120 гр.',
      'img' => 'img/eat2.jpg',
    ],
    [
        'title' => 'Whiskas',
        'cost' => '120 ₽',
        'weigth' => '100 гр.',
        'img' => 'img/eat3.jpg',
    ],
    [
        'title' => 'Purina',
        'cost' => '110 ₽',
        'weigth' => '80 гр.',
        'img' => 'img/eat4.jpg',
    ],
    // ...
  ];

const LIMIT = 2;

$total = count($items);

$page = (int)($_POST['page'] ?? 1);

$remain = $total - $page*LIMIT;

$data = array_slice($items, ($page - 1) * LIMIT, LIMIT);

$template = <<<HTML
<div class="card">
  <img class="card-img" src="{{img}}" alt="{{title}}" title="Кошачий корм {{title}}" width="200" height="230" loading="lazy">
  <div class="card-title">{{title}} - <span>{{weigth}}</span></div>
  <div class="cost">{{cost}}</div>
  <input type="button" value="В корзину" class="buy-btn" id="no-register-shop" onclick="noRegShop()">
</div>
HTML;

header('Content-Type: application/json');

echo json_encode([
    'total' => $total,
    'page' => $page,
    'remain' => $remain,
    'template' => $template,
    'data' => $data,
  ]);

