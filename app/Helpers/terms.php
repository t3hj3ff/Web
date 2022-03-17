<?php

use App\Models\Term;
use App\Models\Taxonomy;

function get_taxonomies($post_type = '')
{
    $tax = new Taxonomy();
    $taxObject = $tax->getAll($post_type);
    if (!empty($taxObject) && is_object($taxObject)) {
        $return = [];
        foreach ($taxObject as $taxonomy) {
            $return[$taxonomy->taxonomy_id] = $taxonomy->taxonomy_title;
        }
        return $return;
    } else {
        return [];
    }
}

function get_terms($taxonomy = 'home-type', $is_object = false, $trans = false)
{
    $return = [];

    $home_taxonomy = ['home-type', 'home-amenity'];
    $experience_taxonomy = ['experience-type', 'experience-languages', 'experience-inclusions', 'experience-exclusions'];
    $car_taxonomy = ['car-type', 'car-equipment', 'car-feature'];

    if((in_array($taxonomy, $home_taxonomy) && !is_enable_service('home')) ||
        (in_array($taxonomy, $experience_taxonomy) && !is_enable_service('experience')) ||
        (in_array($taxonomy, $car_taxonomy) && !is_enable_service('car'))){
        return $return;
    }

    $term = new Term();
    $tax = new Taxonomy();

    $taxObject = $tax->getByName($taxonomy);
    if (!empty($taxObject) && is_object($taxObject)) {
        $terms = $term->getTerms($taxObject->taxonomy_id);
        if ($is_object) {
            $return = $terms;
        } else {
            if ($terms) {
                foreach ($terms as $item) {
                	if($trans)
                        $return[$item->term_id] = esc_attr(get_translate($item->term_title));
                	else
		                $return[$item->term_id] = esc_attr($item->term_title);
                }
            }
        }
    }

    return $return;
}


function get_term_by($by = 'id', $term_id)
{
    $term_model = new Term();
    switch ($by) {
        case 'id':
        default:
            $term = $term_model->getById($term_id);
            break;
        case 'name':
            $term = $term_model->getByName($term_id);
    }

    return $term;
}
