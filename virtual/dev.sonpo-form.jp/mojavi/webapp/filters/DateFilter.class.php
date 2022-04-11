<?php

class NowTimeFilter extends Filter
{

    function & ExecutionTimeFilter ()
    {

    }

    function execute (&$filterChain, &$controller, &$request, &$user)
    {

        static $loaded;

        if ($loaded == NULL)
        {

            $loaded = TRUE;

            ob_start();

            $filterChain->execute($controller, $request, $user);

            $time   = date("m.d.y");

            $content = str_replace('%TIME%', $time, ob_get_contents());

            ob_clean();

            echo "$content\n<!-- Page was processed in $time seconds -->";

        } else
        {

            // filter has already been loaded
            $filterChain->execute($controller, $request, $user);

        }

    }

}

?>
