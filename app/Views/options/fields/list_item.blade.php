    @php
    $layout = (!empty($layout)) ? $layout : 'col-12';
    if (empty($value)) {
        $value = $std;
    }
    $value = maybe_unserialize($value);
    $tmp_items = base64_encode(maybe_serialize($items));
    $idName = str_replace(['[', ']'], '_', $id);

    if(!empty($enqueue_scripts)){
        foreach($enqueue_scripts as $script){
            enqueue_script($script);
        }
    }

    if(!empty($enqueue_styles)){
        foreach($enqueue_styles as $style){
            enqueue_style($style);
        }
    }

    if(isset($condition) && !empty($condition)){
        $conditions = explode(':', $condition);
        if(isset($conditions[0]) && $conditions[0] == 'settings' && count($conditions) == 3){
            $setting = get_option($conditions[1]);
            if($setting != $conditions[2]){
                $layout .= ' hh-hidden-field';
            }
        }
    }
@endphp

<div id="setting-{{ $id }}" data-condition="{{ $condition }}"
     data-unique="{{ $unique }}"
     data-operator="{{ $operation }}" data-bind-from="{{ $bind_from }}"
     class="form-group mb-3 col {{ $layout }} field-{{ $type }}"
     data-id="{{ $id }}" data-items="{{ $tmp_items }}">
    <label for="{{ $idName }}">
        {{ __($label) }}
        @if (!empty($desc))
            <i class="dripicons-information field-desc" data-toggle="popover" data-placement="right"
               data-content="{{ __($desc) }}"></i>
        @endif
    </label>
    <ul class="hh-render hh-list-items">
        @if (!empty($value))
            @php
                $currentOptions = [];
            @endphp
            @foreach ($value as $key => $val)
                <li class="hh-list-item">
                <span class="hh-list-item-heading">
                        <span class="htext"></span>
                        <a href="javascript: void(0)" class="edit"><i class="ti-minus"></i></a>
                        <a href="javascript: void(0)" class="close"><i class="ti-close"></i></a>
                    </span>
                    <div class="render">
                        <?php
                        $unique = time() . rand(0, 9999);
                        foreach ($items as $item) {
                            $item['unique'] = $unique;
                            if (isset($val[$item['id']])) {
                                $item['value'] = $val[$item['id']];
                            }

                            $item['id'] = $id . '[' . $item['id'] . '][]' . $unique;
                            $item = \ThemeOptions::mergeField($item);
                            echo \ThemeOptions::loadField($item);
                        }
                        ?>
                    </div>
                </li>
            @endforeach
        @endif
    </ul>
    <a href="javascript:void(0)" class="btn btn-success add-list-item"
       data-url="{{ \ThemeOptions::url('get-list-item') }}"><i class="icon-plus"></i></a>
</div>
@if($break)
    <div class="w-100"></div> @endif
