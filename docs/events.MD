# Eventos

Criar evento

```bash
php artisan make:event Company/CompanyCreatedEvent
```

Criar ouvinte

```bash
php artisan make:listener CompanyCreatedListener --event=CompanyCreatedEvent
```