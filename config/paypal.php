<?php
return array(

    //Credenciales generadas por paypal
    'client_id'=>'AWTeUiW2bzAwImkISygVR1UftgCTat9Kw_9MVuTt6zP7ab0QKjPdjosxsNypz18fai86Hvt2KDu5Gzcx',
    'secret'=>'EKcK7s_xNTarbAteDdvk8Ic8mVXuRwFv_KixJLxbTROvvZ3j8kTuKPjefXCqpNpTVwq6t-mDjjRzs5r2',

    'settings'=>array(
        //sandbox or live
        'mode'=>'sandbox',

        'http.ConnectionTimeOut' =>30,

        'Log.LogEnabled'=>true,

        'log.FileName'=>storage_path() . '/logs/paypal.log',

        'log.LogLevel'=>'FINE' ),

    );

