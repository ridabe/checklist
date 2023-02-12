<x-mail::message>
# Introduction
<x-mail::panel>
  Ola, :nomeDestinatario
    O bolo :nomeBolo
    esta disponivel em nossas lojas
</x-mail::panel>
Obrigado,<br>
{{ config('app.name') }}
</x-mail::message>
