$redis->rpush($list, $body);

echo "output " . $redis->llen($list) . "<br>";

$arList = $redis->lrange($list, 0, -1);
echo "<pre>";
print_r($arList);
echo "</pre>";
