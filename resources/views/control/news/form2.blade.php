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
                <label for="title">{{__('TITLE')}}({{ $key }})</label>
                <input type="text" id="{{ $key }}" name="title[{{ $key }}]"
                       value="{{ old('title.'. $key, $news->getTranslation('title', $key)) ?? $news->title }}"
                       class="form-control">
                @error('title.'.$key)
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="form-group">
                <label for="summary">{{__('SUMMARY')}}({{ $key }})</label>
                <textarea class="form-control" id="{{ $key }}" rows="3"
                          name="summary[{{ $key }}]">{!! old('summary.'. $key, $news->getTranslation('summary', $key))??$news->summary !!}}</textarea>

                @error('summary.'.$key)
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="form-group">
                <label for="details">{{__('DETAILS')}}({{ $key }})</label>
                <textarea class="form-control" id="{{ $key }}" rows="20"
                          name="details[{{ $key }}]">{!! old('details.'. $key, $news->getTranslation('details', $key))??$news->details !!}}}</textarea>
                @error('details.'.$key)
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

        </div>
    @endforeach
    <div class="form-group">
        <label for="classification_id">{{__('CLASSIFICATION')}}</label>
        <select name="classification_id" class="form-control">
            @foreach ($classifications as $class)
                <option
                    value="{{ $class->id }}" {{ $class->id == $news->classification_id ? 'selected' : '' }}>{{ $class->name }}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label for="case">{{__('CASE')}}</label>
        <select name="case" class="form-control">

            @foreach($news->caseOptions() as $caseOptionKey => $caseOptionValue)
                <option
                    value="{{ $caseOptionKey }}" {{ $news->case == $caseOptionValue ? 'selected' : '' }}>{{ __($caseOptionValue) }}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label for="image" class="form-label">{{__('IMAGE')}}</label>
        @if ($news->image)
            <img alt="" src="{{asset('/storage/'.$news->image)}}" width="200px"/>
        @endif
        <input class="form-control" type="file" multiple name="image">
        @error('image')
        <small class="text-danger">{{ $message }}</small>
        @enderror


    </div>

    <div class="form-group">
        <label for="video">{{__('VIDEO')}}</label>
        <input type="text" name="video" value="{{ old('video') ?? $news->video }}"
               class="form-control">
        @error('video')
        <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>
</div>
