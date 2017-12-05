ChileanVacation Package
===================
[ ![Codeship Status for folivaresrios/chileanvacation](https://app.codeship.com/projects/ad81cc20-a96e-0135-1af4-7260d9433da9/status?branch=master)](https://app.codeship.com/projects/256358) [![License](http://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](https://tldrlegal.com/license/mit-license)

ChileanVacation permite calcular las vacaciones proporcionales como progresivas basado en la ley Chilena

El package sigue los estandares [PSR-1](https://github.com/php-fig/fig-standards/blob/master/accepted/PSR-1-basic-coding-standard.md), [PSR-2](https://github.com/php-fig/fig-standards/blob/master/accepted/PSR-2-coding-style-guide.md), and [PSR-4](https://github.com/php-fig/fig-standards/blob/master/accepted/PSR-4-autoloader.md). 

Requerimientos
------------
La rama Master posee los siguiente requerimientos

* PHP 7.0.0 o mayor.

Como instalar?
---------------
_[Usando [Composer](http://getcomposer.org/)]_

Agrega el package en `composer.json` - de la siguiente manera:

```javascript
{
  "require": {
    "folivaresrios/chileanvacation": "^1.0"
  }
}
```

o a traves de linea de comando

```
composer require folivaresrios/chileanvacation
```

Como Usar?

Existen 5 clases diferentes; Person, Vacation, Holidays, Certificate, Job y para dar flexibilidad al package 4 de estas poseen Interfaces por si ya tienes implementadas estas en tu proyecto con el fin de solo implementar los metodos.

Se debe crear un objeto Certificate con los años acreditados por el documento de la afp como la fecha de entrega de este.

```php
new Certificate($quotedYears, $documentDeliveryDate);
```

Tambien debes crear un objeto Holiday pasando un arreglo con las fechas correspondientes a los feriados

```php
new Holiday($holidays);
```

El objeto Job contiene la fecha de inicio como la de termimno y adicionalmente debe tener los feriados

```php
new Job(string $startDate, string $endDate = null, ChileanHoliday $holiday, Document $certificate = null)
```

Por ultimo el objeto Person, que contiene a Job. Con este ultimo objeto trabajaremos y podremos calcular las vacaciones

```php
new Person(Employment $job)
```


# Los metodos los encontramos "encapsulados" en la clase Vacation

```php
new Vacation (string $requestedDate = null, int $requestedDays = 0, int $vacationDaysTaken = 0, int $progressiveDaysTaken = 0)
```

## getReturnDate($holiday)

Obtenemos la fecha de retorno de las vacaciones solicitadas.

```php
$this->getReturnDate(Holiday $holiday);
```

## getProportionalDays($person)

Obtenemos la fecha de retorno de las vacaciones solicitadas.

```php
$this->getProportionalDays(NaturalPerson $person);
```

## getWorkedDays($person)

Obtenemos los dias trabajados en la empresa

```php
$this->getWorkedDays(NaturalPerson $person)
```

## getProgressiveVacations($person)

Obtenemos los dias de vacaciones proporcionales obtenidos a la fecha

```php
$this->getProgressiveVacations(NaturalPErson $person)
```

## getRemainingProgressiveVacations($person)

Obtenemos los dias restantes de vacaciones proporcionales obtenidos a la fecha

```php
$this->getRemainingProgressiveVacations(NaturalPErson $person)
```

## getRemainingProgressiveVacations($person)

Obtenemos los dias restantes de vacaciones progresivas obtenidos a la fecha

```php
$this->getRemainingVacations(NaturalPErson $person)
```

## Reportando errores

Si tienes problemas con ChileanVacation, abre un "issue" en [GitHub](https://github.com/folivaresrios/overseer/issues).

## Contribuir

Si quieres contribuir con ChileanVacation creado algo que quiereas agregar,envia un [pull
requests](https://help.github.com/articles/using-pull-requests) o abre un
[issues](https://github.com/folivaresrios/chileanvacation/issues).
