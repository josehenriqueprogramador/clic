#!/bin/bash

# Arquivo de saída
output="relatorio_projeto.html"

# Cabeçalho HTML
cat <<'EOF' > $output
<!DOCTYPE html>
<html lang="pt-BR">
<head>
<meta charset="UTF-8">
<title>Relatório do Projeto Laravel</title>
<style>
body { font-family: 'Segoe UI', sans-serif; background: #f9f9f9; padding: 20px; }
h1 { text-align: center; }
h2 { background: #222; color: #fff; padding: 10px; border-radius: 8px; }
h3 { background: #555; color: #fff; padding: 6px; border-radius: 6px; }
pre {
  background: #1e1e1e;
  color: #eaeaea;
  padding: 10px;
  border-radius: 6px;
  overflow-x: auto;
  font-size: 14px;
}
a { color: #00bcd4; text-decoration: none; }
a:hover { text-decoration: underline; }
.section { margin-bottom: 30px; }
</style>
</head>
<body>
<h1>📁 Relatório Completo do Projeto Laravel</h1>
EOF

# Função para gerar seções
add_section() {
  titulo="$1"
  shift
  arquivos=("$@")
  echo "<div class='section'><h2>$titulo</h2>" >> $output
  for file in "${arquivos[@]}"; do
    echo "<h3>$file</h3><pre>" >> $output
    sed 's/&/\&amp;/g; s/</\&lt;/g; s/>/\&gt;/g' "$file" >> $output
    echo "</pre>" >> $output
  done
  echo "</div>" >> $output
}

# ROTAS
routes=(routes/*.php)
add_section "Rotas" "${routes[@]}"

# CONTROLLERS
controllers=(app/Http/Controllers/*.php)
add_section "Controllers" "${controllers[@]}"

# MODELS
models=$(grep -Rl --include="*.php" "class .* extends .*Model" app app/Models)
add_section "Models" ${models[@]}

# VIEWS
views=$(find resources/views -type f \( -name '*.blade.php' -o -name '*.php' \))
add_section "Views" ${views[@]}

# Rodapé HTML
cat <<'EOF' >> $output
</body>
</html>
EOF

echo "✅ Relatório gerado em: $output"
echo "Abra no navegador com: firefox $output  (ou seu navegador preferido)"
