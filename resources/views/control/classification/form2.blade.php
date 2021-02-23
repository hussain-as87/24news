@csrf
<ul class="nav nav-tabs" id="myTab" role="tablist">
    @foreach(config('locales.languages') as $key => $val)
        <li class="nav-item" role="presentation">
            <a class="nav-link {{ $loop->index == 0 ? 'active' : '' }}" id="{{ $key }}-tab" data-toggle="tab"
               href="#{{ $key }}" role="tab" aria-controls="{{ $key }}" aria-selected="true">{{ $val['name'] }}</a>
        </li>
    @endforeach
</ul>

<div class="tab-content" id="myTabContent">
    @foreach(config('locales.languages') as $key => $val)
        <div class="tab-pane fade {{ $loop->index == 0 ? 'show active' : '' }}" id="{{ $key }}" role="tabpanel"
             aria-labelledby="{{ $key }}-tab">

            <div class="form-group">
                <label for="name">{{__('NAME')}}({{$key}})</label>
                <input type="text" class="form-control"
                       aria-describedby="nameHelp" name="name[{{$key}}]"
                       value="{{old('name.'.$key, $classification->getTranslation('name', $key))??$classification->name}}">
                @error('name.'.$key)
                <small class="text-danger">{{$message}}</small>
                @enderror
            </div>
        </div>
    @endforeach
</div>

