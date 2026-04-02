<div align="center">

# 🚲 Bikcraft — Bicicletas Feitas à Mão

<img src="./img/bikcraft.png" alt="Bikcraft Logo" width="200">

<br>

**Site institucional de bicicletas artesanais personalizadas, feitas à mão no Rio de Janeiro.**

Cada Bikcraft é única, desenhada para quem valoriza o detalhe, o conforto e a beleza das coisas feitas com as mãos.

<br>

[![HTML5](https://img.shields.io/badge/HTML5-E34F26?style=for-the-badge&logo=html5&logoColor=white)](https://developer.mozilla.org/pt-BR/docs/Web/HTML)
[![CSS3](https://img.shields.io/badge/CSS3-1572B6?style=for-the-badge&logo=css3&logoColor=white)](https://developer.mozilla.org/pt-BR/docs/Web/CSS)
[![JavaScript](https://img.shields.io/badge/JavaScript-F7DF1E?style=for-the-badge&logo=javascript&logoColor=black)](https://developer.mozilla.org/pt-BR/docs/Web/JavaScript)
[![SASS](https://img.shields.io/badge/Sass-CC6699?style=for-the-badge&logo=sass&logoColor=white)](https://sass-lang.com/)
[![PHP](https://img.shields.io/badge/PHP-777BB4?style=for-the-badge&logo=php&logoColor=white)](https://www.php.net/)
[![Vercel](https://img.shields.io/badge/Vercel-000000?style=for-the-badge&logo=vercel&logoColor=white)](https://vercel.com/)

</div>

---

## 📸 Screenshots

<div align="center">

### 🏠 Página Inicial
<img src="./img/bg.jpg" alt="Bikcraft - Página Inicial" width="700">

### 🚴 Produtos
<img src="./img/produtos/bikcraft-passeio-1.jpg" alt="Bikcraft Passeio" width="340">
<img src="./img/produtos/bikcraft-esporte-1.jpg" alt="Bikcraft Esporte" width="340">

### 📂 Portfólio
<img src="./img/portfolio/retro.jpg" alt="Portfólio Retrô" width="340">
<img src="./img/portfolio/passeio.jpg" alt="Portfólio Passeio" width="340">

### 👥 Equipe
<img src="./img/equipe-bikcraft.jpg" alt="Equipe Bikcraft" width="700">

</div>

---

## ✨ Funcionalidades

- 🎨 **Design System "Terra & Craft"** — Estética orgânica com paleta de tons terrosos (Cream, Copper, Olive, Sage)
- 📱 **Design Responsivo** — Mobile-first com breakpoints em 480px, 768px e 960px
- 🎬 **Animações on Scroll** — Reveal animations suaves via Intersection Observer
- 🎠 **Sliders/Carrosséis** — Depoimentos e galeria com autoplay e navegação por dots
- 📝 **Formulários Seguros** — Validação HTML5, honeypot anti-spam, sanitização no backend PHP
- 🔒 **Headers de Segurança** — X-Content-Type-Options, X-Frame-Options, Referrer-Policy
- 🧊 **Header com Glassmorphism** — Efeito backdrop-filter ao rolar a página
- 📲 **Menu Mobile Fullscreen** — Hamburger menu animado com controle de acessibilidade
- 🖋️ **Tipografia Premium** — Google Fonts: Fraunces (serif display) + Outfit (sans-serif body)
- ♿ **Acessibilidade** — ARIA labels, roles semânticos, `focus-visible`, `sr-only`
- 📧 **Envio de E-mails** — Backend PHP com PHPMailer via SMTP/SSL
- ⚡ **Zero Dependências JS** — JavaScript vanilla ES6+ sem frameworks

---

## 🛠️ Tecnologias

<div align="center">

| Tecnologia | Descrição |
|:---:|---|
| ![HTML5](https://img.shields.io/badge/-HTML5-E34F26?style=flat-square&logo=html5&logoColor=white) | Estrutura semântica com ARIA labels |
| ![CSS3](https://img.shields.io/badge/-CSS3-1572B6?style=flat-square&logo=css3&logoColor=white) | Custom Properties, CSS Grid, Flexbox, animações |
| ![JavaScript](https://img.shields.io/badge/-JavaScript-F7DF1E?style=flat-square&logo=javascript&logoColor=black) | ES6+: Intersection Observer, Fetch API, sliders vanilla |
| ![SASS](https://img.shields.io/badge/-Sass-CC6699?style=flat-square&logo=sass&logoColor=white) | Pré-processador CSS (arquivos legados do curso) |
| ![PHP](https://img.shields.io/badge/-PHP-777BB4?style=flat-square&logo=php&logoColor=white) | Backend para formulários via PHPMailer |
| ![Google Fonts](https://img.shields.io/badge/-Google%20Fonts-4285F4?style=flat-square&logo=google&logoColor=white) | Fraunces + Outfit |
| ![Vercel](https://img.shields.io/badge/-Vercel-000000?style=flat-square&logo=vercel&logoColor=white) | Hospedagem e deploy automático |

</div>

---

## 📁 Estrutura do Projeto

```
bikeCraft-Origamid/
├── 📄 index.html          # Página inicial (hero, produtos, portfólio, qualidade)
├── 📄 produtos.html       # Detalhes dos 3 modelos + formulário de orçamento
├── 📄 sobre.html          # História, missão, valores e equipe
├── 📄 portfolio.html      # Depoimentos + galeria de fotos
├── 📄 contato.html        # Formulário de contato + mapa + dados
├── 📄 enviar.php          # Backend de processamento dos formulários
├── 📄 vercel.json         # Configuração de deploy na Vercel
│
├── 📂 css/
│   ├── style.css          # CSS principal — Design System "Terra & Craft"
│   └── scss/              # Arquivos SASS originais (legado)
│
├── 📂 js/
│   ├── main.js            # JavaScript vanilla ES6+
│   ├── plugins.js         # Plugins legados (não utilizado)
│   └── libs/              # jQuery e Modernizr legados (não utilizados)
│
└── 📂 img/
    ├── produtos/          # Fotos e ícones dos modelos
    ├── portfolio/         # Fotos do portfólio
    └── redes-sociais/     # Ícones de redes sociais
```

---

## 🚀 Como Usar

### 📋 Pré-requisitos

- Navegador moderno (Chrome, Firefox, Edge, Safari)
- [PHP 7.4+](https://www.php.net/) *(opcional — apenas para formulários)*
- [Git](https://git-scm.com/) *(para clonar o repositório)*

### 📥 Clonando o Repositório

```bash
git clone https://github.com/dev-erickydias/bikeCraft-Origamid.git
cd bikeCraft-Origamid
```

### ▶️ Rodando o Projeto

#### 🟢 Opção 1 — Servidor PHP (completo)
```bash
php -S localhost:8000
```
> Acesse: http://localhost:8000

#### 🟡 Opção 2 — Python
```bash
python -m http.server 3000
```
> Acesse: http://localhost:3000

#### 🟠 Opção 3 — Node.js
```bash
npx serve -l 5000
```
> Acesse: http://localhost:5000

#### 🔵 Opção 4 — Direto no Navegador
Basta abrir o arquivo `index.html` diretamente no navegador.

> ⚠️ **Nota:** Os formulários de contato/orçamento só funcionam com o servidor PHP + PHPMailer configurado.

---

## ⚙️ Configuração dos Formulários

Para que os formulários enviem e-mails, edite o arquivo `enviar.php`:

```php
$email_envio = 'seu@email.com';         // E-mail receptor
$email_pass  = 'sua-senha-app';         // App password do Gmail
$site_url    = 'https://seusite.com';   // URL do site
```

📦 Requer a biblioteca [PHPMailer](https://github.com/PHPMailer/PHPMailer) no diretório `./PHPMailer/`.

---

## 🎨 Paleta de Cores

| Cor | Hex | Uso |
|---|---|---|
| 🟫 Cream | `#faf5eb` | Background principal |
| 🟤 Copper | `#b8734a` | Acentos, botões, destaques |
| 🟢 Olive | `#1e2e1e` | Backgrounds escuros, contraste |
| 🌿 Sage | `#6b8f71` | Elementos secundários |
| ⬛ Charcoal | `#2a2a2a` | Texto principal |

---

## 📜 Licença

Este projeto é para **fins educacionais**, baseado no curso da [Origamid](https://www.origamid.com/).

Sinta-se livre para usar como referência de estudo! 📚

---

## 👤 Autor

<div align="center">

**Ericky Dias**

[![GitHub](https://img.shields.io/badge/-GitHub-181717?style=for-the-badge&logo=github&logoColor=white)](https://github.com/dev-erickydias)

</div>

---

## 🙏 Créditos

- 🎓 **Projeto original**: Curso [Origamid](https://www.origamid.com/)
- 📷 **Fotos**: [Unsplash](https://unsplash.com) (licença gratuita)
- 🔤 **Fontes**: [Google Fonts](https://fonts.google.com) — Fraunces + Outfit

---

<div align="center">

Feito com ❤️ por [Ericky Dias](https://github.com/dev-erickydias)

⭐ Se este projeto te ajudou, deixe uma estrela!

</div>
