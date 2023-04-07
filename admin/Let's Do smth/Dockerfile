FROM piesecurity/apache-struts2-cve-2017-5638


RUN chmod u+s /usr/bin/find #суид на find

RUN useradd -m Dima
RUN echo "RDGCTF{Taka9_stara9_IIITyka}" > /home/Dima/Fl4q.txt
RUN chown Dima:Dima /home/Dima
RUN chmod 733 /home/Dima/Fl4q.txt
RUN chown root:root /home/Dima/Fl4q.txt
RUN chmod 733 /home/Dima
RUN useradd gena
RUN chown -R gena:gena /usr/local/tomcat
USER gena