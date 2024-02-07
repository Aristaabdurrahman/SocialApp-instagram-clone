<img src="{{ asset('images/avatar/'. $user->avatar) }}" 
      alt="{{ $user->username }} Avatar"
      {{ $attributes->merge([
        'class' => 'rounded-circle',
        'width' => '',
        'height' => '',
        'id' => '',   
      ]) }} >
