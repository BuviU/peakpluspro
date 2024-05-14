<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

use App\Libraries\MenuLoader;

class UserPermissionFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        $menuLoader = new MenuLoader();
        $data = $menuLoader->loadMenuData();

        if ($data['user_role'] == 1) {
            return $request;
        }

        $allowed_urls = array();
        foreach ($data['allowed_menu_list'] as $menu) {
            $allowed_urls[] = $menu['url'];
        }

        $is_allowed = false;

        // url with query params / dynamic urls
        $urls_with_query_params = array(
            'settings/group_privilege',
            'master_files/api_access_permissions',
            'documents/forward',
            'documents/view',
            'hrm_settings/privileges',
        );

        // get request uri
        $uri = service('uri');
        $path = $uri->getRoutePath();

        foreach ($urls_with_query_params as $url) {
            if (strpos($path, $url) !== false) {
                $path = $url;
                break;
            }
        }

        foreach ($allowed_urls as $url) {
            if (strpos($url, $path) !== false) {
                $is_allowed = true;
                break;
            }
        }

        if ($is_allowed) {
            return $request;
        } else {
            // redirect /403 route
            return redirect()->to(base_url('403'));
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do something after the route has executed
    }
}
