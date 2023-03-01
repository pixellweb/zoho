<?php

namespace PixellWeb\Zoho\app\Ressources;

class Contrat extends Ressource
{

    const VIEW_SITES_EN_LIGNE = '282576000015321005';

    /**
     * @param string $view_id
     * @param array $fields
     * @return array
     */
    public function getSitesInternet(string $view_id = self::VIEW_SITES_EN_LIGNE, array $fields = ['Domaine'] )
    {
        return $this->api->get("Deals?cvid=" . $view_id . "&fields=" . implode(',', $fields ));
    }

}
