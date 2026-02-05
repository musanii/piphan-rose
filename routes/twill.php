<?php

use A17\Twill\Facades\TwillRoutes;

// Register Twill routes here eg.
// TwillRoutes::module('posts');

TwillRoutes::module('inventories');
TwillRoutes::module('students');
TwillRoutes::module('finances');
TwillRoutes::module('activities');
TwillRoutes::module('staff');
TwillRoutes::singleton('homepage');