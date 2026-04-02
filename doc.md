# 📄 Documentação Técnica — Bikcraft

---

## 📌 Nome do Projeto

**Bikcraft — Bicicletas Feitas à Mão**

## 📝 Descrição

Site institucional da **Bikcraft**, uma empresa fictícia de bicicletas artesanais personalizadas, localizada em Botafogo, Rio de Janeiro. O projeto foi desenvolvido como parte do curso da [Origamid](https://www.origamid.com/) e posteriormente modernizado com um design system próprio chamado **"Terra & Craft"**, que traz uma estética orgânica e editorial com paleta de tons terrosos.

A Bikcraft oferece três linhas de bicicletas feitas à mão: **Passeio**, **Esporte** e **Retrô**. O site apresenta os produtos, portfólio de clientes com depoimentos, história da empresa e formulários de contato/orçamento.

---

## 🛠️ Tecnologias Utilizadas

| Tecnologia | Versão / Detalhes | Uso no Projeto |
|---|---|---|
| **HTML5** | Semântico com ARIA | Estrutura de todas as páginas, acessibilidade |
| **CSS3** | Custom Properties, Grid, Flexbox | Estilização completa, design system com tokens |
| **SASS/SCSS** | Pré-processador | Arquivos legados do curso original (pasta `css/scss/`) |
| **JavaScript ES6+** | Vanilla JS (sem frameworks) | Interações, animações, sliders, formulários |
| **PHP** | 7.4+ | Backend para processamento de formulários via PHPMailer |
| **Google Fonts** | Fraunces + Outfit | Tipografia do design system |
| **Unsplash** | Imagens gratuitas | Fotos de alta qualidade para hero e backgrounds |
| **Vercel** | Hospedagem | Deploy estático via `vercel.json` |
| **Node.js** | v24 (`.node-version`) | Ambiente de desenvolvimento |

---

## 📁 Estrutura do Projeto

```
bikeCraft-Origamid/
│
├── 📄 index.html              # Página inicial (hero, produtos, portfólio, qualidade, citação)
├── 📄 produtos.html           # Detalhes das 3 linhas de bikes + formulário de orçamento
├── 📄 sobre.html              # História, missão, valores da empresa + foto da equipe
├── 📄 portfolio.html          # Depoimentos de clientes + galeria de fotos com slider
├── 📄 contato.html            # Formulário de contato + dados + mapa de localização
├── 📄 enviar.php              # Backend PHP para processamento seguro de formulários
├── 📄 favicon.ico             # Ícone do site
├── 📄 vercel.json             # Configuração de deploy na Vercel
├── 📄 .node-version           # Versão do Node.js (v24)
├── 📄 README.md               # Documentação principal do repositório
├── 📄 doc.md                  # Esta documentação técnica detalhada
│
├── 📂 css/
│   ├── 📄 style.css           # CSS principal compilado — Design System "Terra & Craft"
│   └── 📂 scss/               # Arquivos SASS originais do curso (legado)
│       ├── 📄 style.scss              # Arquivo principal que importa todos os partials
│       ├── 📄 _variaveis-e-mixins.scss # Variáveis de cores, mixins de tipografia e breakpoints
│       ├── 📄 _normalize.scss          # Normalize.css v3.0.2
│       ├── 📄 _reset.scss             # Reset CSS customizado
│       ├── 📄 _grid.scss              # Sistema de grid com 16 colunas (960px)
│       ├── 📄 _geral.scss             # Estilos gerais: header, footer, botões, animações
│       ├── 📄 _sobre.scss             # Estilos específicos da página Sobre
│       ├── 📄 _produtos.scss          # Estilos específicos da página Produtos
│       ├── 📄 _portfolio.scss         # Estilos específicos da página Portfólio
│       └── 📄 _contato.scss           # Estilos específicos da página Contato
│
├── 📂 js/
│   ├── 📄 main.js             # JavaScript principal — ES6+ vanilla
│   ├── 📄 plugins.js          # Plugins legados (ResponsiveSlides, Visibility API)
│   └── 📂 libs/               # Bibliotecas legadas
│       ├── 📄 jquery-1.11.2.min.js    # jQuery (legado, não utilizado no código atual)
│       └── 📄 modernizr.custom.45655.js # Modernizr (legado, não utilizado)
│
└── 📂 img/
    ├── 📄 bg.jpg, bg-*.jpg            # Imagens de fundo das seções e páginas
    ├── 📄 bikcraft.png                # Logo da Bikcraft
    ├── 📄 bikcraft-qualidade.png      # Imagem da seção qualidade
    ├── 📄 equipe-bikcraft.jpg         # Foto da equipe
    ├── 📄 endereco-bikcraft.jpg       # Imagem do mapa/endereço
    ├── 📄 og-image.png                # Imagem Open Graph para redes sociais
    ├── 📄 favicon.png                 # Favicon em PNG
    ├── 📄 linhas.png                  # Elemento decorativo
    ├── 📂 produtos/                   # Fotos e ícones dos 3 modelos
    │   ├── 📄 passeio.png, esporte.png, retro.png    # Ícones dos modelos
    │   ├── 📄 bikcraft-passeio-1.jpg, bikcraft-passeio-2.jpg
    │   ├── 📄 bikcraft-esporte-1.jpg, bikcraft-esporte-2.jpg
    │   └── 📄 bikcraft-retro-1.jpg, bikcraft-retro-2.jpg
    ├── 📂 portfolio/                  # Fotos do portfólio
    │   ├── 📄 retro.jpg
    │   ├── 📄 passeio.jpg
    │   └── 📄 esporte.jpg
    └── 📂 redes-sociais/              # Ícones de redes sociais
        ├── 📄 facebook.png
        ├── 📄 instagram.png
        └── 📄 twitter.png
```

---

## 📖 Explicação Detalhada de Cada Arquivo/Componente

### 🏠 Páginas HTML

#### `index.html` — Página Inicial
- **Hero Section**: Imagem fullscreen com título animado, descrição e botão CTA ("Solicitar Orçamento")
- **Seção Produtos**: Grid com 3 cards dos modelos (Passeio, Esporte, Retrô) com ícones e descrições
- **Seção Portfólio**: Grid de imagens dos projetos com fundo escuro
- **Seção Qualidade**: Destaca Durabilidade, Design e Sustentabilidade como diferenciais
- **Seção Citação**: Blockquote com frase de William Morris sobre fundo parallax
- **Footer**: 3 colunas com história, contato e redes sociais

#### `produtos.html` — Página de Produtos
- **Hero Interno**: Banner com título "Produtos"
- **3 Seções de Produto**: Cada modelo (Passeio, Esporte, Retrô) possui:
  - Galeria com foto principal e foto de detalhe
  - Sidebar com ícone, descrição e tags de características
- **Formulário de Orçamento**: Formulário completo com campos nome, e-mail, telefone e especificações
- **Dados de Contato**: Informações para personalização (cores, estilo, medidas, acessórios)

#### `sobre.html` — Página Sobre
- **Hero Interno**: Banner com título "Sobre"
- **Seção Sobre**: Grid com texto da história/missão/visão + lista de valores
- **Foto da Equipe**: Imagem fullwidth da equipe Bikcraft
- **Seção Qualidade**: Repetição da seção de qualidade (durabilidade, design, sustentabilidade)

#### `portfolio.html` — Página Portfólio
- **Hero Interno**: Banner com título "Portfólio"
- **Seção Depoimentos**: Slider/carrossel com 3 depoimentos de clientes (Barbara Moss, Jhony Rato, Bernardo) com navegação por dots
- **Galeria de Projetos**: Slider de galeria com 2 slides, cada um contendo grid de 3 fotos

#### `contato.html` — Página de Contato
- **Hero Interno**: Banner com título "Contato"
- **Formulário de Contato**: Campos de nome, e-mail, telefone, mensagem + honeypot anti-spam
- **Dados de Contato**: Telefone, e-mail, endereço e links de redes sociais
- **Seção Mapa**: Imagem clicável do endereço com link para Google Maps

---

### 🎨 CSS — Design System "Terra & Craft"

#### `css/style.css` — Arquivo Principal (Moderno)
O CSS principal implementa um design system completo com:

**Tokens de Design (Custom Properties):**
- **Paleta de Cores**: Tons terrosos — Cream (`#faf5eb`), Copper (`#b8734a`), Olive (`#1e2e1e`), Sage (`#6b8f71`), Charcoal (`#2a2a2a`)
- **Tipografia**: `Fraunces` (display serif) + `Outfit` (body sans-serif)
- **Espaçamento**: Escala de `--s-xs` (0.5rem) a `--s-3xl` (8rem)
- **Layout**: Max-width 1200px, gutter responsivo com `clamp()`, border-radius
- **Motion**: Easing curves, durações (fast/med/slow)
- **Sombras**: 4 níveis (sm, md, lg, copper)

**Componentes:**
- **Buttons**: 4 variantes (default, solid, white, dark) com efeito hover animado
- **Header**: Fixo com glassmorphism (backdrop-filter) ao rolar, menu mobile fullscreen
- **Hero**: Fullscreen com overlay gradient e animações de entrada
- **Product Cards**: Grid responsivo com ícones e descrições
- **Testimonials Slider**: Carrossel com translateX e dots de navegação
- **Forms**: Inputs estilizados com foco acessível, validação visual
- **Footer**: Grid de 3 colunas com fundo escuro

**Responsividade**: Breakpoints em 480px, 768px e 960px com abordagem mobile-first

#### `css/scss/` — Arquivos SASS Legados
Arquivos originais do curso Origamid, mantidos para referência:
- **`_variaveis-e-mixins.scss`**: Cor amarela (`#fec63e`), mixins de tipografia (`tipo-1`, `tipo-2`) e breakpoints para tablet (768-959px) e mobile (<767px)
- **`_grid.scss`**: Sistema de grid de 16 colunas baseado em 960px, responsivo
- **`_geral.scss`**: Header amarelo fixo, estilos globais, botões, footer, animações fadeInDown
- **Partials de página**: `_sobre.scss`, `_produtos.scss`, `_portfolio.scss`, `_contato.scss`

---

### ⚡ JavaScript

#### `js/main.js` — JavaScript Principal
Código moderno em vanilla ES6+ organizado em IIFEs (Immediately Invoked Function Expressions):

1. **Header Scroll Effect**: Adiciona classe `is-scrolled` ao rolar 60px, ativando glassmorphism
2. **Mobile Menu Toggle**: Hamburger menu com controle de `aria-expanded` para acessibilidade
3. **Reveal on Scroll**: Animações de entrada via `IntersectionObserver` com threshold de 15%
4. **Testimonials Slider**: Carrossel com autoplay de 5s, navegação por dots, wrapping circular
5. **Portfolio Gallery Slider**: Segundo carrossel para galeria com autoplay de 4s
6. **Form Handling**: Validação client-side, verificação de honeypot, envio via `fetch()` com feedback visual
7. **Smooth Scroll**: Scroll suave para links âncora (`href="#..."`)

#### `js/plugins.js` — Plugins Legados (não utilizado)
- **ResponsiveSlides.js v1.54**: Plugin jQuery para slides responsivos
- **Visibility.js**: API para controle de visibilidade de abas

#### `js/libs/` — Bibliotecas Legadas (não utilizadas)
- **jQuery 1.11.2**: Dependência dos plugins legados
- **Modernizr**: Detecção de features do navegador

---

### 🖥️ Backend

#### `enviar.php` — Processamento de Formulários
Handler PHP seguro para envio de e-mails via PHPMailer:

**Fluxo:**
1. Verifica se é requisição POST (retorna 405 se não for)
2. Rate limiting por sessão (30 segundos entre envios)
3. Verificação de honeypot anti-spam
4. Sanitização de inputs (`strip_tags`, `filter_var`, `htmlspecialchars`)
5. Validação de campos obrigatórios (nome, e-mail, mensagem)
6. Proteção contra email header injection
7. Envio via SMTP (Gmail, porta 465, SSL)
8. Renderização de página de resposta com auto-redirect

**Configuração necessária:**
```php
$email_envio = 'seu@email.com';     // E-mail receptor
$email_pass  = 'sua-senha-app';     // App password do Gmail
$host_smtp   = 'smtp.gmail.com';    // Servidor SMTP
$host_port   = '465';               // Porta SSL
```

**Dependência:** Biblioteca [PHPMailer](https://github.com/PHPMailer/PHPMailer) no diretório `./PHPMailer/`

---

### ⚙️ Configuração

#### `vercel.json`
Configuração de deploy na Vercel como site estático:
```json
{
  "buildCommand": null,
  "outputDirectory": ".",
  "framework": null
}
```

#### `.node-version`
Especifica a versão do Node.js: **24**

---

## 🔒 Segurança

O projeto implementa diversas medidas de segurança:

| Medida | Onde | Detalhes |
|---|---|---|
| Headers HTTP de segurança | HTML `<meta>` | `X-Content-Type-Options: nosniff`, `X-Frame-Options: SAMEORIGIN`, `Referrer-Policy` |
| Validação client-side | `main.js` | Validação de e-mail por regex, campos obrigatórios |
| Validação server-side | `enviar.php` | `filter_var`, limites de caracteres, campos obrigatórios |
| Anti-spam (Honeypot) | HTML + PHP + JS | Campos invisíveis que bots preenchem mas humanos não |
| Rate Limiting | `enviar.php` | 30 segundos entre envios via sessão PHP |
| Sanitização de Input | `enviar.php` | `strip_tags()`, `htmlspecialchars()`, `filter_var()` |
| Proteção Header Injection | `enviar.php` | Rejeita inputs com `\r\n` |
| Links externos seguros | HTML | `rel="noopener noreferrer"` em todos os links `target="_blank"` |
| SMTP com SSL | `enviar.php` | Porta 465 com `SMTPSecure = 'ssl'` |
| Prevenção de XSS | `main.js` | Uso de `textContent` ao invés de `innerHTML` para mensagens |

---

## 📦 Instalação de Dependências

Este projeto **não possui dependências NPM** — é um site estático puro com HTML, CSS e JavaScript vanilla.

A única dependência externa é a biblioteca **PHPMailer** para o backend de formulários:

```bash
# Baixar PHPMailer (necessário apenas para os formulários)
# Colocar na pasta ./PHPMailer/ na raiz do projeto
# Disponível em: https://github.com/PHPMailer/PHPMailer
```

---

## 🚀 Como Rodar o Projeto Localmente

### Opção 1 — Servidor PHP (completo, com formulários)
```bash
# Clonar o repositório
git clone https://github.com/dev-erickydias/bikeCraft-Origamid.git

# Entrar na pasta do projeto
cd bikeCraft-Origamid

# Iniciar servidor PHP
php -S localhost:8000
```
Acesse: `http://localhost:8000`

### Opção 2 — Python (somente páginas estáticas)
```bash
cd bikeCraft-Origamid
python -m http.server 3000
```
Acesse: `http://localhost:3000`

### Opção 3 — Node.js (somente páginas estáticas)
```bash
cd bikeCraft-Origamid
npx serve -l 5000
```
Acesse: `http://localhost:5000`

### Opção 4 — Abrir diretamente no navegador
Basta abrir o arquivo `index.html` diretamente no navegador. Os formulários não funcionarão, mas toda a navegação e interações visuais estarão disponíveis.

> ⚠️ **Nota:** Os formulários de contato/orçamento só funcionam com o servidor PHP + PHPMailer configurado.

---

## 🔗 Como Clonar

```bash
git clone https://github.com/dev-erickydias/bikeCraft-Origamid.git
```

---

## 👤 Autor

**Ericky Dias**
- GitHub: [@dev-erickydias](https://github.com/dev-erickydias)

---

## 📚 Créditos

- **Projeto original**: Curso [Origamid](https://www.origamid.com/)
- **Fotos**: [Unsplash](https://unsplash.com) (licença gratuita)
- **Fontes**: [Google Fonts](https://fonts.google.com) (Fraunces + Outfit)
- **Ícones de redes sociais**: Acervo do projeto original

---

*Documentação gerada em Abril de 2026.*
