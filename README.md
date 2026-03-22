# Bikcraft — Bicicletas Feitas à Mão

Site institucional da **Bikcraft**, empresa de bicicletas artesanais personalizadas localizada em Botafogo, Rio de Janeiro.

## Sobre o Projeto

A Bikcraft oferece três linhas de bicicletas feitas à mão: **Passeio**, **Esporte** e **Retrô**. O site apresenta os produtos, portfólio de clientes, história da empresa e formulários de contato/orçamento.

### Design

O projeto utiliza o conceito **"Terra & Craft"** — uma estética orgânica e editorial com paleta de tons terrosos:

- **Cores**: Creme `#faf5eb`, Olive `#1e2e1e`, Copper `#b8734a`, Sage `#6b8f71`
- **Tipografia**: [Fraunces](https://fonts.google.com/specimen/Fraunces) (display serif) + [Outfit](https://fonts.google.com/specimen/Outfit) (body sans)
- **Fotos**: Imagens de alta qualidade via [Unsplash](https://unsplash.com)

## Estrutura de Arquivos

```
bikeCraft-Origamid/
├── index.html          # Página inicial (hero, produtos, portfólio, qualidade)
├── produtos.html       # Detalhes das 3 linhas + formulário de orçamento
├── sobre.html          # História, missão, valores e equipe
├── portfolio.html      # Depoimentos de clientes + galeria de fotos
├── contato.html        # Formulário de contato + mapa + dados
├── enviar.php          # Backend de processamento dos formulários (PHPMailer)
├── favicon.ico
├── css/
│   ├── style.css       # CSS principal (custom properties, Grid, Flexbox)
│   └── scss/           # Arquivos SASS originais (legado)
├── js/
│   ├── main.js         # JavaScript vanilla (ES6+)
│   ├── plugins.js      # Plugins legados (não utilizado)
│   └── libs/           # Bibliotecas legadas (não utilizadas)
└── img/
    ├── produtos/       # Fotos e ícones dos produtos
    ├── portfolio/      # Fotos do portfólio
    └── redes-sociais/  # Ícones de redes sociais
```

## Tecnologias

| Tecnologia | Uso |
|---|---|
| HTML5 | Estrutura semântica com ARIA labels |
| CSS3 | Custom properties, CSS Grid, Flexbox, animações |
| JavaScript ES6+ | Intersection Observer, Fetch API, sliders |
| PHP | Processamento de formulários via PHPMailer |
| Google Fonts | Fraunces + Outfit |

## Funcionalidades

- **Design responsivo** — Mobile-first com breakpoints em 480px, 768px e 960px
- **Animações on scroll** — Reveal animations via Intersection Observer
- **Sliders** — Carrosséis de depoimentos e galeria em JS vanilla
- **Formulários seguros** — Validação HTML5, honeypot anti-spam, sanitização no backend
- **Header dinâmico** — Glassmorphism com backdrop-filter ao rolar
- **Menu mobile** — Fullscreen com animação de hamburger

## Como Executar

### Requisitos

- [PHP 7.4+](https://www.php.net/) (para o servidor local e formulários)

### Servidor de Desenvolvimento

```bash
# Na raiz do projeto
php -S localhost:8000
```

Acesse `http://localhost:8000` no navegador.

### Alternativas (somente arquivos estáticos)

```bash
# Com Python
python -m http.server 3000

# Com Node.js
npx serve -l 5000
```

> **Nota:** Os formulários de contato só funcionam com o servidor PHP.

## Configuração do Formulário (enviar.php)

Para que os formulários enviem e-mails, edite as variáveis no início do `enviar.php`:

```php
$email_envio = 'seu@email.com';     // E-mail receptor
$email_pass  = 'sua-senha-app';     // Senha do e-mail (ou app password)
$site_name   = 'Bikcraft';          // Nome do site
$site_url    = 'https://seusite.com'; // URL do site
```

Requer a biblioteca [PHPMailer](https://github.com/PHPMailer/PHPMailer) no diretório `./PHPMailer/`.

## Segurança

O projeto implementa as seguintes medidas de segurança:

- Headers HTTP: `X-Content-Type-Options`, `X-Frame-Options`, `Referrer-Policy`
- Formulários: validação client-side (HTML5) e server-side (PHP)
- Anti-spam: campos honeypot invisíveis
- Rate limiting por sessão (30s entre envios)
- Sanitização de input (`strip_tags`, `htmlspecialchars`, `filter_var`)
- Proteção contra email header injection
- Links externos com `rel="noopener noreferrer"`
- SMTP com SSL (`SMTPSecure = 'ssl'`, porta 465)

## Créditos

- **Projeto original**: Curso [Origamid](https://www.origamid.com/)
- **Fotos**: [Unsplash](https://unsplash.com) (licença gratuita)
- **Fontes**: [Google Fonts](https://fonts.google.com)

## Licença

Este projeto é para fins educacionais, baseado no curso da Origamid.
