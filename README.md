# 📋 To-Do List Laravel MVC

Seções do projeto

-   [Descrição](#-descrição)
-   [Funcionalidades](#-funcionalidades)
-   [Tecnologias](#-tecnologias)
-   [Instalação e Execução](#-instalação-e-execução)
-   [Estrutura do Projeto](#-estrutura-do-projeto)
-   [Funcionalidades Principais](#-funcionalidades-principais)
-   [Possíveis Melhorias](#-possíveis-melhorias)

## ✔️ Descrição

To-Do List Laravel MVC é uma aplicação web moderna de gerenciamento de tarefas desenvolvida com arquitetura MVC (Model-View-Controller). O sistema permite que usuários criem, editem, deletem e restaurem tarefas, com funcionalidades de busca, filtros e paginação.

O projeto implementa autenticação completa, políticas de autorização, soft deletes (exclusão suave) e uma interface responsiva desenvolvida com Tailwind CSS, seguindo o padrão Blade de templates do Laravel.

## 💻 Funcionalidades

### 🔐 Autenticação

-   **Registro de Usuários**: Cadastro com validação de dados
-   **Login**: Sistema de autenticação com email e senha
-   **Middleware de Autenticação**: Proteção de rotas com middleware auth
-   **Logout**: Desconexão segura do sistema

### 📝 Gestão de Tarefas

-   **Criar Tarefas**: Cadastro de tarefas com título, descrição e status
-   **Editar Tarefas**: Atualização de informações das tarefas
-   **Deletar Tarefas**: Exclusão suave (soft delete) mantendo dados no banco
-   **Restaurar Tarefas**: Recuperação de tarefas deletadas
-   **Status**: Controle de tarefas pendentes e completas
-   **Autorização**: Cada usuário vê apenas suas próprias tarefas

### 🔍 Busca e Filtros

-   **Busca por Título**: Pesquisa textual em tempo real
-   **Filtro por Status**: Filtragem por tarefas pendentes ou completas
-   **Paginação**: Navegação eficiente com 5 tarefas por página
-   **Combinação de Filtros**: Busca e filtros funcionam em conjunto

### 🎨 Interface Moderna

-   **Design Responsivo**: Interface adaptável para mobile, tablet e desktop
-   **UI Consistente**: Paleta de cores harmoniosa (#FFE5CC, #E59763, #5C3D2E)
-   **Componentes Visuais**: Cards arredondados, sombras e transições suaves
-   **Feedback Visual**: Mensagens de sucesso, erros e estados vazios
-   **Ícones SVG**: Interface enriquecida com ícones personalizados

### 📊 Dashboard Inteligente

-   **Saudação Dinâmica**: Mensagens personalizadas baseadas no horário (Good Morning, Good Afternoon, etc.)
-   **Perfil do Usuário**: Avatar inicial, nome e handle
-   **Resumo de Status**: Visualização rápida do status das tarefas
-   **Navegação Intuitiva**: Botões de ação rápida

## 🔨 Tecnologias

### Backend

-   **PHP 8.2+**: Linguagem de programação
-   **Laravel 12**: Framework PHP moderno
-   **MySQL/PostgreSQL**: Banco de dados relacional
-   **Eloquent ORM**: Mapeamento objeto-relacional

### Frontend

-   **Blade Templates**: Engine de templates do Laravel
-   **Tailwind CSS 4**: Framework CSS utility-first
-   **Vite 7**: Build tool e bundler moderno
-   **JavaScript**: Interatividade frontend

### Desenvolvimento

-   **Composer**: Gerenciador de dependências PHP
-   **NPM**: Gerenciador de pacotes JavaScript
-   **Artisan**: CLI do Laravel
-   **Soft Deletes**: Recuperação de dados deletados

### Segurança

-   **BCrypt**: Hash de senhas
-   **CSRF Protection**: Proteção contra Cross-Site Request Forgery
-   **Authorization Policies**: Controle de acesso granular

## 🚀 Instalação e Execução

### Pré-requisitos

-   PHP 8.2 ou superior
-   Composer
-   Node.js e NPM
-   Banco de dados (MySQL, PostgreSQL ou SQLite)

### Instalação

1. **Clone o repositório:**

```bash
git clone <url-do-repositorio>
cd to-do-list
```

2. **Instale as dependências:**

```bash
composer install
npm install
```

3. **Configure o ambiente:**

```bash
cp .env.example .env
php artisan key:generate
```

4. **Configure o banco de dados no arquivo .env:**

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=seu_banco
DB_USERNAME=seu_usuario
DB_PASSWORD=sua_senha
```

5. **Execute as migrações:**

```bash
php artisan migrate
```

6. **Compile os assets:**

```bash
npm run build
```

### Execução

**Modo Desenvolvimento:**

```bash
php artisan serve
npm run dev
```

A aplicação estará disponível em: `http://localhost:80`

**Produção:**

```bash
php artisan serve --env=production
```

## 📁 Estrutura do Projeto

```
to-do-list/
├── app/
│   ├── Http/
│   │   ├── Controllers/          # Controladores (Auth, Dashboard, ToDoList)
│   │   ├── Requests/             # Request Validation
│   │   └── Middleware/           # Middlewares de autenticação
│   ├── Models/                   # Models (User, ToDoList)
│   ├── Policies/                 # Policies de autorização
│   └── Providers/                # Service Providers
├── database/
│   ├── migrations/                # Migrações do banco de dados
│   ├── seeders/                  # Seeders para dados iniciais
│   └── factories/                # Factories para testes
├── resources/
│   ├── views/                    # Blade templates
│   │   ├── auth/                 # Views de autenticação
│   │   ├── components/           # Componentes Blade
│   │   ├── todolists/            # Views de tarefas
│   │   ├── dashboard.blade.php
│   │   └── welcome.blade.php
│   └── css/                      # Arquivos CSS
├── routes/
│   └── web.php                   # Rotas da aplicação
├── public/                       # Arquivos públicos
└── config/                       # Arquivos de configuração
```

## 🎯 Funcionalidades Principais

### Dashboard (`/dashboard`)

-   **Rota**: `GET /dashboard`
-   **Autenticação**: Requerida
-   **Funcionalidades**:
    -   Listagem paginada de tarefas (5 por página)
    -   Busca por título
    -   Filtro por status (pending/completed)
    -   Indicadores visuais de status
    -   Ações de editar e deletar

### Criar Tarefa (`/todolists/create`)

-   **Rota**: `GET /todolists/create` (formulário)
-   **Rota**: `POST /todolists/create` (criação)
-   **Autenticação**: Requerida
-   **Campos**:
    -   `title` (requerido, string)
    -   `description` (opcional, text)
    -   `status` (pending/completed)

### Editar Tarefa (`/todolists/{id}/edit`)

-   **Rota**: `GET /todolists/{id}/edit` (formulário)
-   **Rota**: `PUT /todolists/{id}/edit` (atualização)
-   **Autenticação**: Requerida
-   **Autorização**: Usuário deve ser dono da tarefa

### Deletar Tarefa (`DELETE /todolists/{id}`)

-   **Soft Delete**: Tarefa não é removida fisicamente
-   **Autorização**: Apenas o dono pode deletar
-   **Redirecionamento**: Retorna para dashboard com mensagem

### Tarefas Deletadas (`/todolists/deleted`)

-   **Rota**: `GET /todolists/deleted`
-   **Funcionalidade**: Lista todas as tarefas deletadas
-   **Ação**: Permite restaurar tarefas

### Restaurar Tarefa (`PUT /todolists/restore/{id}`)

-   **Funcionalidade**: Recupera uma tarefa deletada
-   **Redirecionamento**: Retorna para dashboard

## 📋 Possíveis Melhorias

### 🔐 Segurança e Autenticação

-   [ ] Implementar reset de senha via email
-   [ ] Adicionar verificação de email (email confirmation)
-   [ ] Implementar autenticação de dois fatores (2FA)
-   [ ] Adicionar rate limiting para login
-   [ ] Implementar logout em outros dispositivos

### 🎯 Funcionalidades Avançadas

-   [ ] **Sistema de Categorias**: Organizar tarefas por categorias/projetos
-   [ ] **Tags e Etiquetas**: Sistema de tags para melhor organização
-   [ ] **Prioridades**: Implementar níveis de prioridade (baixa, média, alta)
-   [ ] **Data de Vencimento**: Adicionar deadlines com alertas
-   [ ] **Subtarefas**: Implementar tarefas filhas
-   [ ] **Arquivos e Anexos**: Permitir upload de arquivos nas tarefas
-   [ ] **Checklist**: Criar listas de verificação dentro de tarefas

### 📊 Dashboard e Relatórios

-   [ ] **Estatísticas**: Gráficos de produtividade e conclusão
-   [ ] **Calendário de Tarefas**: Visualização mensal/semanal
-   [ ] **Filtros Avançados**: Por data, prioridade, categoria
-   [ ] **Exportação**: Exportar tarefas para CSV/PDF
-   [ ] **Relatórios**: Gerar relatórios de atividade

### 🔔 Notificações e Lembretes

-   [ ] **Notificações por Email**: Alertas de tarefas próximas
-   [ ] **Push Notifications**: Notificações no navegador
-   [ ] **Lembretes Customizados**: Configurar alertas personalizados
-   [ ] **Timer Pomodoro**: Integração de técnica de produtividade

### 👥 Colaboração (Futuro)

-   [ ] **Compartilhamento de Tarefas**: Compartilhar tarefas entre usuários
-   [ ] **Comentários**: Sistema de comentários nas tarefas
-   [ ] **Atribuição**: Designar tarefas para outros usuários
-   [ ] **Activity Feed**: Histórico de atividades em tempo real

### 🎨 UI/UX

-   [ ] **Tema Escuro**: Implementar dark mode
-   [ ] **Personalização**: Permitir usuário customizar cores
-   [ ] **Drag and Drop**: Reordenar tarefas por drag and drop
-   [ ] **Animações**: Adicionar mais transições e animações
-   [ ] **PWA**: Transformar em Progressive Web App
-   [ ] **Modo Offline**: Funcionamento offline com sincronização

### 🚀 Performance

-   [ ] **Cache**: Implementar cache de consultas frequentes
-   [ ] **Lazy Loading**: Carregar tarefas sob demanda
-   [ ] **Infinite Scroll**: Substituir paginação por scroll infinito
-   [ ] **Otimização de Imagens**: Compressão e otimização de assets
-   [ ] **CDN**: Implementar CDN para assets estáticos

### 🧪 Testes e Qualidade

-   [ ] **Test Coverage**: Aumentar cobertura de testes para 80%+
-   [ ] **Testes E2E**: Implementar testes end-to-end com Cypress
-   [ ] **CI/CD**: Configurar pipeline de integração contínua
-   [ ] **Code Quality**: Adicionar PHPStan e Laravel Pint
-   [ ] **Documentação API**: Gerar documentação automática com Swagger

### 📱 Multiplataforma

-   [ ] **API REST**: Criar API completa para mobile
-   [ ] **Aplicativo Mobile**: Desenvolver app nativo (React Native/Flutter)
-   [ ] **Integrações**: Integrar com Google Calendar, Trello, etc.
-   [ ] **Webhooks**: Permitir integrações externas

### 🔍 Busca Avançada

-   [ ] **Busca Global**: Busca em todos os campos simultaneamente
-   [ ] **Busca Semântica**: Busca inteligente com IA
-   [ ] **Filtros Salvos**: Salvar combinações de filtros
-   [ ] **Ordenação Avançada**: Múltiplos critérios de ordenação

---

## 👨‍💻 Desenvolvido por

Este projeto foi desenvolvido como um desafio técnico demonstrando conhecimento em:

-   Arquitetura MVC
-   Laravel Framework
-   Tailwind CSS
-   PHP moderno
-   Desenvolvimento Full-Stack
