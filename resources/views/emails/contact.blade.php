
    <p><strong>Прізвище:</strong> {{$data['surname']}}</p>
    <p><strong>Імʼя:</strong> {{$data['name']}}</p>
    <p><strong>Телефон:</strong> {{$data['phone']}}</p>
    @if (!empty($data['viber']))
        <p><strong>Viber:</strong> {{$data['viber']}}</p>
    @endif
    @if (!empty($data['telegram']))
        <p><strong>Telegram:</strong> {{$data['telegram']}}</p>
    @endif
    @if (!empty($data['whatsapp']))
        <p><strong>WhatsApp:</strong> {{$data['whatsapp']}}</p>
    @endif
    <p><strong>Email:</strong> {{$data['email']}}</p>
    <p><strong>Повідомлення:</strong> {{$data['message']}}</p>
    