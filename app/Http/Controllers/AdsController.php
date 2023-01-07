<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;

class AdsController extends BaseController
{
    public function showAds($id)
    {

        $cmd = "curl 'https://www.facebook.com/ads/library/async/search_ads/?session_id=e7c4666d-8ed9-4878-b871-97cd3328d7ff&count=30&active_status=all&ad_type=all&countries\[0\]=BR&view_all_page_id=105565268073186&media_type=all&search_type=page' \
        -H 'authority: www.facebook.com' \
        -H 'accept: */*' \
        -H 'accept-language: pt-BR,pt;q=0.9' \
        -H 'content-type: application/x-www-form-urlencoded' \
        -H 'cookie: datr=nKu5Y2kY2pbq2kC7sE5AH0wz; wd=1237x940; dpr=2' \
        -H 'origin: https://www.facebook.com' \
        -H 'referer: https://www.facebook.com/ads/library/?active_status=all&ad_type=all&country=BR&view_all_page_id=105565268073186&search_type=page&media_type=all' \
        -H 'sec-ch-ua: \"Not?A_Brand\";v=\"8\", \"Chromium\";v=\"108\", \"Google Chrome\";v=\"108\"' \
        -H 'sec-ch-ua-mobile: ?0' \
        -H 'sec-ch-ua-platform: \"macOS\"' \
        -H 'sec-fetch-dest: empty' \
        -H 'sec-fetch-mode: cors' \
        -H 'sec-fetch-site: same-origin' \
        -H 'user-agent: Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36' \
        -H 'x-fb-lsd: AVqCLVxM8Z8' \
        --data-raw '__user=0&__a=1&__dyn=7xeUmxa3-Q8zo5ObwKBWobVo9E4a2i5U4e1FxebzEdF8aUuxa1ZzES2S2q2i0SotxG4o3Bw5VCyU4a0OE2WxO2O1Vwooa8465o-cw5MKdwGwQwoE2LwBgao884y0Mo5Wm588Egz82ezXwrUcUjwVw9O79UbobEaUtws8nwhE2LxiawCw46wJwSyES0gq0K-1bwzwqobU2cwAw&__csr=&__req=1&__hs=19364.BP%3ADEFAULT.2.0.0.0.0&dpr=2&__ccg=EXCELLENT&__rev=1006796584&__s=0m4b3a%3A0s78j1%3A2xuw2z&__hsi=7185963388542403199&__comet_req=0&lsd=AVqCLVxM8Z8&jazoest=2892&__spin_r=1006796584&__spin_b=trunk&__spin_t=1673112481&__jssesw=1' \
        --compressed";

        $ads = shell_exec($cmd);

        $output = [];
        if($ads) {
            $output = json_decode(str_replace('for (;;);', '', shell_exec($cmd)));
        }


        return response()->json($output);
    }

    public function testAds()
    {
        return response()->json(['Hello World!']);
    }
}
