# Laravel Components

Conjunto de componentes Blade para desenvolvimento rápido de formulários com suporte ao [Monalisa](https://github.com/vesperabr/monalisa) e em breve a outros frameworks CSS.

## Funcionalidades

* Componentes para form, input, textarea, select, multi-select, checkbox e radio.
* Gerenciamento automático do [Form Method Spoofing](https://laravel.com/docs/master/routing#form-method-spoofing)
* Gerenciamento automático do [CSRF Protection](https://laravel.com/docs/master/csrf)
* Suporte ao [Monalisa](https://github.com/vesperabr/monalisa) e em breve outros frameworks CSS.
* Atribuição automática de valores.
* Re-população de valores via [old input](https://laravel.com/docs/master/requests#old-input).
* Classes dos componentes e views totalmente customizáveis.

## Requisitos

* PHP 7.3
* Laravel 7

## Instalação

Você pode instalar este pacote pelo composer:

```bash
composer require vesperabr/laravel-form-components
```

## Exemplo rápido

```blade
<x-form>
    <x-input name="nome" label="Nome" />
    <x-input type="cpf" name="cpf" label="CPF" />
    <x-input type="email" name="email" label="E-mail" />
    <x-input type="password" name="senha" label="Senha" />
    <button>Enviar</button>
</x-form>
```

## Componentes

### Form

Por padrão o componente `<x-form>` utiliza o verbo GET no atributo `method`.

Você pode informar qualquer outro verbo e o componente irá lidar automaticamente com o *method spoofing* e controle de CSRF para você.

```blade
<!-- Utilizando -->
<x-form method="PUT">
    ...
</x-form>

<!-- Irá gerar: -->
<form method="POST">
    <input type="hidden" name="_method" value="PUT">
    <input type="hidden" name="_token" value="xxx">
</form>
```

Você pode informar normalmente qualquer outro atributo da tag `<form>`, como por exemplo `action`, `class`, `id`, etc.

### Label

Na maioria dos componetes deste pacote você pode informar o atributo `label`, com isto o componente irá renderizar uma tag `<label>` com o valor especificado.

### Input

Por padrão o componente `<x-input />` gera uma tag `<input />` com o atributo `type="text"`, mas você pode informar qualquer outro `type` padrão do HTML como por exemplo password, email, tel, url, number, etc.

Você pode informar outros atributos como `required`, `placeholder`, `class`, `id`, etc.

```blade
<x-input type="email" label="Digite seu email" name="email" required />
```

#### Tipos especiais 

O componente `<x-input />` aceita alguns tipos especiais como `cpf`, `cnpj`, `cpfcnpj`, `cep`, `float` e `money`. Isso irá aplicar máscaras de formatação ao campo.

```blade
<x-input type="cpf" name="cpf" placeholder="Digite seu CPF" />
```

#### Inserindo valores antes e depois do campo

Você pode informar também os atributos `append` e `prepend`. Isto irá exibir valores antes ou depois do campo.

```blade
<x-input type="float" name="preco" prepend="R$" />

<x-input name="subdominio" append=".vespera.com.br" />
```

### Textarea

Este componente é bem parecido com o `<x-input />`, com exceção ao suporte de máscaras e valores antes e depois.

```blade
<x-textarea label="Observações" name="observacoes" />
```

### Select

O componente `<x-select />` precisa que você informe o atributo `options` para que ele popule os valores que o usuário pode escolher. Este atributo deve ser um array  no formato *chave => valor*.

```php
$paises = [
    'br' => 'Brasil',
    'us' => 'Estados Unidos',
    'jp' => 'Japão',
];
```

```blade
<x-select name="pais" :options="$paises" />
```

Você pode definir qual(is) o(s) valor(es) que deverão vir selecionado(s) através do atributo `selected`. Se você adicionar o atributo `multiple` ao componente, lembre-se de passar um array simples com as chaves que deverão ser selecionadas.

```blade
<x-select name="pais" :options="$paises" selected="['br', 'jp']" multiple />
```

### Checkbox

Você pode criar um conjunto de checkboxes utilizando o componente `<x-checkboxes />`. Assim como o componente `<x-select />` você deve informar o atributo `options` contendo um array no formato *chave => valor*.

```blade
<x-checkboxes name="paises[]" :options="$paises" />
```

Você pode informar os valores que devem vir selecionados através do atributo `selected` que pode ser uma string ou um array contendo as chaves que devem ser selecionadas.

```blade
<x-checkboxes name="paises[]" :options="$paises" :selected="['br', 'jp']" />
```

Há também o componente `<x-checkbox />` que irá criar um único checkbox. Ele deve ser usado para criar campos de aceite ou ativo/inativo.

Você pode informar o atributo `default` que irá prover um input hidden com o valor padrão caso o campo não seja selecionado.

```blade
<x-checkbox name="ativo" value="sim" default="nao" label="Usuário ativo?" />
```

### Radio

O componente `<x-radios />` prove um conjuto de radios. Você deve informar o atributo `options` contendo um array no formato *chave => valor*.

```blade
<x-radios name="paises" :options="$paises" />
```

Para definir o valor que deve vir selecionado, utilize o atributo `selected`.

```blade
<x-radios name="paises" :options="$paises" selected="br" />
```

### Buttons

O componente `<x-buttons />` gera os botões para controle do formulário.

Você pode informar o atributo `submit` que será o texto do botão de envio do formulário.

```blade
<x-buttons submit="Enviar formulário" />
```

Se você informar também o atributo `cancel-url`, o componente irá exibir um link cancelar apontando para o valor informado.

```blade
<x-buttons submit="Enviar formulário" cancel-url="http://google.com" />
```

Você pode informar também o atributo `loader`, que exibe um loader ao clicar no botão de enviar. Somente a presença deste atributo já habilita loader. Se você definir um valor para o atributo, o texto do botão será alterado enquanto ele estiver com o loader ativo.

```blade
<x-buttons submit="Salvar" loader />

<x-buttons submit="Salvar" loader="Salvando..." />
```

## Atribuição de valores

Como visto, você pode definir os valores dos campos atráves do atributo `value` (para o componente `<x-input />`) ou através do atributo `selected` (para os componentes `<x-select />`, `<x-radios />`, `<x-checkboxes />` e `<x-checkbox />`).

### Model binding

Ao invés de definir os atributos `value` e `selected`, há também a possibilidade de pegar o valor de um campo automaticamente de um model Eloquent ou de um array associativo. Basta utilizar o atributo `:bind`.

No exemplo abaixo o componente irá procurar na variável `$usuario` (que deve ser uma instância de um model Eloquent ou um array associativo) a propriedade `nome` que foi definida através do atributo `name`. Neste caso o valor do campo seria o valor de `$usuario->nome`.

```blade
<x-input name="nome" :bind="$usuario" />
```

Você pode fazer o bind em vários campos de uma só vez informando o atributo `bind` no componente `<x-form>` ou utilizando as diretivas `@bind` e `@endbind`.

```blade
<x-form :bind="$usuario">
    <x-input name="nome" />
    <x-input name="email" />
</x-form>
```

```blade
<x-form>
    @bind($usuario)
        <x-input name="nome" />
        <x-input name="email" />
    @endbind
</x-form>
```

Você pode inclusive intercalar bindings.

```blade
<x-form :bind="$usuario">
    <x-input name="nome" />

    @bind($perfilDoUsuario)
        <x-textarea name="descricao">
    @endbind
</x-form>
```

Você pode também desabilitar o bind definindo o atributo `:bind` ou a diretiva `@bind` como `false`.

```blade
<x-form :bind="$usuario">
    <x-input name="nome" />
    <x-input name="email" :bind="false" />
</x-form>
```

### Old input data

Quando ocorre um erro de validação e o Laravel redireciona você de volta ao formulário, os campos continuarão com os valores digitados. Isto irá sempre sobrescrever qualquer valor padrão.

## Customização

Você pode publicar o arquivo de configuração e também as views com o seguinte comando:

```bash
php artisan vendor:publish --provider="Vespera\LaravelFormComponents\ServiceProvider"
```

O arquivo de configuração `form-components.php` estará disponível na pasta `config` e as views serão publicadas na pasta `resources/views/vendor/form-components`.

No arquivo de configuração você pode definir qual framework CSS você irá utilizar e também a localização de cada view utilizada em cada componente.

## Créditos

- Este pacote é inspirado no ótimo trabalho do [Pascal Baljet](https://github.com/pascalbaljetmedia/laravel-form-components).
