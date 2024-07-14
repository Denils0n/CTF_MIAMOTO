#!/usr/bin/env sh

mv /etc/rc2.d/S16ssh /etc/
mv /etc/rc2.d/S91apache2 /etc

cd /etc/rc2.d/
rm *

mv /etc/S16ssh /etc/rc2.d/

mv /etc/S91apache2 /etc/rc2.d

cd /root

users=(

    'mariasilva:senha321:Analista de Qualidade'
    'pedroalmeida:senha654:Designer Industrial'
    'lucasrodrigues:senha987:Analista de Marketing Digital'
    'enzon:enzoomaiordarede:Tecnico de Rede'


)

for user in "${users[@]}"; do

    IFS=':' read -r usuario senha comentario <<< "$user"
    
    useradd -m -c "$comentario" "$usuario"

    echo "$usuario:$senha" | chpasswd

done 

chat_owner="mariasilva"
chat_dir="/home/$chat_owner/.chat"

mkdir -p "$chat_dir"

chown "$chat_owner:$chat_owner" "$chat_dir"

echo "Diretório $chat_dir criado com sucesso."

# Loop para criar links simbólicos em todos os usuários
for user in "${users[@]}"; do
    IFS=':' read -r username password description <<< "$user"

    if [ "$username" != "$chat_owner" ]; then
        user_home="/home/$username"
        ln -s "$chat_dir" "$user_home/.chat"
    fi
done


texto1="$chat_dir/desabafo.txt"
echo "stou muito bravo com a situação atual no nosso projeto. O gestor da rede fica fazendo backup toda hora do projeto e não fala onde está salvando esses backups. Isso é completamente frustrante e desorganizado!

Além disso, o cara não para de brincar com os agendadores de tarefas. Toda vez que eu tento fazer algo, ele já mudou a programação e eu nunca sei o que está realmente acontecendo ou quando as tarefas vão ser executadas. Estou cansado dessa falta de comunicação e dessa bagunça toda. Parece que ele não entende o impacto que essas mudanças constantes têm no nosso trabalho diário. É como se ele estivesse brincando com a nossa paciência e comprometendo a eficiência da equipe inteira.

Não dá mais para aguentar essa situação! Alguém precisa falar para ele que essa atitude está prejudicando todo mundo. Já faz muito tempo que estamos lidando com isso, e é hora de ter uma conversa séria sobre como as coisas estão sendo conduzidas. Precisamos de mais transparência e estabilidade nas nossas rotinas." | tee "$texto1"

chown "$chat_owner:$chat_owner" "$texto1"


chmod u+s /usr/bin/nmap
chmod u+s /usr/bin/python
chmod u+s /usr/bin/vi

touch /var/test.sh

chmod 777 /var/test.sh


script_path="/var/test.sh"

cron_jog="*/5 * * * * /bin/bash $script_path"

echo "$cron_jog" | crontab -

rm -drf /root/*

cp -r Projeto /root

cp /root/Projeto /var/back/

echo "MIAMOTO" > /etc/hostname

sudo usermod -l msfadmin adm

sudo usermod -g adm adm

nova_senha="admin123"

echo "adm:$nova_senha" | sudo chpasswd

sudo usermod -d /home/msfadmin -m adm











