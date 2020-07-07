<?php

namespace Digikraaft\Flutterwave;

class Settlement extends ApiResource
{
    const OBJECT_NAME = 'settlements';

    use ApiOperations\All;
    use ApiOperations\Fetch;

}
