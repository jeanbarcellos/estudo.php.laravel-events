_Repositório apenas para estudo_

# Laravel - Eventos

Implementação de evetos (Events) e ouvintes (Listners) no laravel

Versão: 8

Instrutor:

-   N/D

Referências:

-   [Documentação](https://laravel.com/docs/8.x/events)
-   [Post: Aprenda como Trabalhar com Eventos no Laravel](https://blog.especializati.com.br/aprenda-como-trabalhar-com-eventos-no-laravel/)

## Anotações

Comando Artisan para gerar quaisquer eventos ou ouvintes listados em seu `App\Providers\EventServiceProvider` que ainda não existam:

```bash
php artisan event:generate
```

Comando Artisan `make:event` e `make:listener` para gerar eventos e ouvintes individuais:

```bah
php artisan make:event PodcastProcessed

php artisan make:listener SendPodcastNotification --event=PodcastProcessed
```

### Registrando eventos manualmente

Os eventos devem ser registrados por meio do array `$listen` em `App\Providers\EventServiceProvider`
